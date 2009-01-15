function Effect()
{
  this.item = null;
  this.initialize();
}
Effect.prototype.item = null;
Effect.prototype.initialize = function(item)
{
  this.item = item;
}
Effect.prototype.odd = function()
{
}