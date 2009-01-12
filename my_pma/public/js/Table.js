/*TABLE*/
function Table(element)
{
  this.DomElement = null;
  this.lastPosition = new Array();
  this.relationship = new Array();
  
  this.initialize(element);
}
/**
 * init position
 * add event listener for mouse over and mouse up (draggable behavior depend on it)
 */
Table.prototype.initialize = function(element)
{
  this.DomElement = element;
  observe(this.DomElement, 'mousedown', this.handlerMouseDownTable, true);
  observe(this.DomElement, 'mouseup', this.handlerMouseUpTable, true);
}




/**
 * update offset for drag
 * update style for drag
 * add dragable behavior
 */
Table.prototype.handlerMouseDownTable = function(event)
{
  tableObj = tableManager.getElement(event.currentTarget);
  tableObj.lastPosition = new Pointer(event.layerX, event.layerY);
  tableObj.DomElement.style.opacity = "0.5";
  tableObj.DomElement.style.zIndex = "1000";
  observe(tableObj.DomElement, 'mousemove', tableObj.drag, true);
}
/**
 * update style for drop
 * remove dragable behavior
 * update relationship on canvas
 */
Table.prototype.handlerMouseUpTable = function (event)
{
  tableObj = tableManager.getElement(event.currentTarget);
  tableObj.DomElement.style.opacity = "1";
  tableObj.DomElement.style.zIndex = "0";
  stopObserve(tableObj.DomElement, 'mousemove', tableObj.drag, true);
  tableManager.drawRelationships();
}

Table.prototype.drag = function(event)
{
  tableObj = tableManager.getElement(event.currentTarget);
  tableObj.DomElement.style.left = (event.pageX - tableObj.lastPosition.offsetLeft) + "px";
  tableObj.DomElement.style.top = (event.pageY - tableObj.lastPosition.offsetTop) + "px";
}


Table.prototype.getPosition= function()
{
  return (({'top': this.DomElement.style.top,
           'left': this.DomElement.style.left}));
}

Table.prototype.initRelationships = function()
{
  var e = new Element(this.DomElement).$$(".foreign_key");
  if (e == null)
    return (null);
  for (var i = 0; i < e.length; i++)
  {
    var reg = new RegExp("\\|", "g");
    //get dom element
    var domRef = $("#table_" + (e[i].getAttribute('id').split(reg)[1]));
    //get table element
    var tableObjRef = tableManager.getElement(domRef);
    
    tableObjRef.relationship.push({'from':this});
    this.relationship.push({'to':tableObjRef});
  }
}
/**
 * methode appeler pour le dessin de ttes les relation
 * une relation ayant deux sens, on ne dessine que de la table reférende
 */
Table.prototype.drawRelationships = function()
{
  for (var i = 0; i < this.relationship.length; i++)
  {
    for (param in this.relationship[i])
    {
      if (param == "to")
        draw(this.relationship[i].to.DomElement, this.DomElement);
    }
  }
}
/**
 * mise à jour des relations à la volée, on le up des deux sens
 * from->to
 * to->from
 */
Table.prototype.updateRelationships = function()
{
  for (var i = 0; i < this.relationship.length; i++)
  {
    for (param in this.relationship[i])
    {
      if (param == "to")
        draw(this.relationship[i].to.DomElement, this.DomElement);
      else
        draw(this.DomElement, this.relationship[i].from.DomElement);
    }
  }
}