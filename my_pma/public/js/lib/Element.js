//aliases
function $(expression){ return (new Element(expression).getOne(0)); }
function $$(expression){ return (new Element(expression).getAll()); }

//constructeur
function Element(element)
{
  this.root = null;
  this.elements = new Array();
  
  if (typeof(element) == 'string')
  {
    this.root = window.document;
    this.parseExpression(element);
  }
  else
    this.root = element;
}

/**
 * accesseurs
 */
Element.prototype.getOne = function(index){ return (this.elements[index]); }
Element.prototype.getAll = function(){ return (this.elements); }


/**
 * @desc parse expressionSelector and call the DOM function
 * @param string expression
 */
Element.prototype.parseExpression = function(expression)
{
  var regSplit = new RegExp(",", "g");
  var elementsToFind = expression.split(regSplit);
  
  for (var i = 0; i < elementsToFind.length; i++)
  {
    if (elementsToFind[i][0] == "#")
      this.elements.push(this.$(elementsToFind[i]));
    else if (elementsToFind[i][0] == ".")
      this.elements = this.elements.concat(this.$$(elementsToFind[i]));
    else
      this.elements = this.elements.concat(this.$$$(elementsToFind[i]));
  }
}


/**
 * @desc alias for getElementById
 * @param string expression
 */
Element.prototype.$ = function(expression)
{ 
  return (document.getElementById(expression.substring(1)));
}
/**
 * @desc getElementsClassName
 * @param string expression
 */
Element.prototype.$$ = function(expression)
{
  expression = expression.substring(1);
  var results = new Array();
  var nodesChild = this.root.getElementsByTagName('*');
  var reg = new RegExp(expression);
  for (var i = 0; i < nodesChild.length; i++)
  {
    var className = (nodesChild[i].className)? nodesChild[i].className : "";
    if(className != "" && (className == expression || className.match(reg)))
      results.push(nodesChild[i]);
  }
  return ((results.length != 0) ? results : null);
}
/**
 * @desc alias for getElementsByTagName
 * @param string expression
 */
Element.prototype.$$$ = function(expression)
{
  var results = new Array();
  var nodesChild = this.root.getElementsByTagName(expression);
  for (var i = 0; i < nodesChild.length; i++)
    results.push(nodesChild[i]);
  return ((results.length != 0) ? results : null);
}


//TODO
Element.prototype.applyFctOnOne = function ()
{
}
//TODO
Element.prototype.applyFctOnAll = function ()
{
}

//toString (debug)
Element.prototype.toString = function()
{
  return("selection: " + this.elements.join(',') + "\n" +
         "root: " + this.root + "\n");
}