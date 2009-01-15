function Effect(item)
{
  this.item = null;
  this.initialize(item);
}
Effect.prototype.item = null;
Effect.prototype.initialize = function(item)
{
  this.item = item;
}
Effect.prototype.odd = function(e)
{
  elements = ((e != null) ? item : this.item);
  nb_element = elements.length;
  for (var i = 0; i < elements.length; i++)
  {
	  debug(elements[i]);
	  for (var j = 0; j < elements[i].length; j++)
	  {
		  alert(elements[i][j]);
	  }
  }
}