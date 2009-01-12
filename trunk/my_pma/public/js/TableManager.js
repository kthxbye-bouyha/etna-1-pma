//fait figure de singleton
var tableManager = null;
function TableManager()
{
  this.elements = new Array();
  this.initialize();
}
//CONSTANTS
TableManager.prototype.TABLE_CLASSNAME = ".table_container";
TableManager.prototype.FK_CLASSNAME = ".foreign_key";

TableManager.prototype.initialize = function()
{
  
}
/**
 * recupère ttes les tables et créer leurs correspondances objets JS
 */
TableManager.prototype.populate = function()
{
  //find all domTables
  var listTable = new Element(this.TABLE_CLASSNAME);
  
  //create tables object
  for (var i = 0; i < listTable.getAll().length; i++)
    this.elements.push(new Table(listTable.getOne(i)));
  
  //init relationship between table (to->from)
  for (var i = 0; i < this.elements.length; i++)
    this.elements[i].initRelationships();
}
/**
 * eclate le schema visuel (utiliser pour les nouvelles visualisation)
 */
TableManager.prototype.burstSchema = function()
{
  alert("burstSchema");
}
/**
 * charge le schema dernièrement enregistré
 */
TableManager.prototype.loadSchema = function()
{
  alert("load");
}
/**
 * sauvegarde le schéma
 */
TableManager.prototype.saveSchema = function()
{
  
  var data = new Array();
  for (var i = 0; i < this.elements.length; i++)
  {
    data.push({
              tableName: this.elements[i].DomElement.getAttribute('id'),
              left: parseInt(this.elements[i].DomElement.style.left) || 0,
              top: parseInt(this.elements[i].DomElement.style.top) || 0}
    );
  }
  var data_serialized = "db_name=" + $('#db_name').innerHTML + "&";
  for (var i = 0; i < data.length; i++)
  {
    data_serialized = data_serialized + "&" + data[i].tableName + "[x]=" + data[i].left + 
                    "&" + data[i].tableName + "[y]=" + data[i].top;
  }
  return (data_serialized);
}
/**
 * dessine ttes les relations
 */
TableManager.prototype.drawRelationships = function()
{
  adjustSize();
  for (var i = 0; i < this.elements.length; i++)
    this.elements[i].drawRelationships();
}
/**
 * recupère un element(Table) par comparaison du domElement
 */
TableManager.prototype.getElement = function(element_searched)
{
  for (var i = 0; i < this.elements.length; i++)
  {
    if (element_searched.isSameNode(this.elements[i].DomElement))
      return (this.elements[i]);
  }
  return (false);
}

