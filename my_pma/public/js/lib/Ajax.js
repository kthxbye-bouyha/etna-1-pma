function Ajax()
{
  this.requester;
  this.initialize();
}
Ajax.prototype.errors = new Array();
Ajax.prototype.mimeType = "text/xml";
Ajax.prototype.params = null;

Ajax.prototype.setParams = function(params)
{
  this.params = params;
}
Ajax.prototype.setMimeType = function(value)
{
  if (this.requester.overrideMimeType)
    this.request.overrideMimeType(this.mimeType);
}
Ajax.prototype.registerCallback = function(fct)
{
  this.callback = fct;
}
Ajax.prototype.callback = function (){ }
Ajax.prototype.getResponse = function()
{
  if (this.errors.length < 1)
    return (this.response);
  else
    return (this.errors);
}
Ajax.prototype.initialize = function()
{
  if (window.XMLHttpRequest)
  {
    this.request = new XMLHttpRequest();
    if (this.request.overrideMimeType)
      this.request.overrideMimeType(this.mimeType);
  }
  else if (window.ActiveXObject)
  {
    try {
      this.request = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e) {
      try {
        this.request = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e) {
        this.errors.push("impossible d'instancier un objet httpRequest");
        return (false);
      }
    }
  }
  if (this.request == null)
  {
    this.errors.push("echec lors de l'instanciation de l'objet httpRequest");
    return (false);
  }
  return (true);
}
Ajax.prototype.proccedingElement = null;
Ajax.prototype.completeElement = null;
Ajax.prototype.process = function()
{
  if (this.readyState == 4)
  {
    if (this.status == 200)
    {
    	elem = createElement("tmp");
    	elem.innerHTML = this.responseText;
    	Ajax.prototype.completeElement.innerHTML = elem.firstChild.innerHTML;
    	if (Ajax.prototype.completeElement.style.display == 'none')
    		Ajax.prototype.completeElement.style.display = 'block';
    	odd();
    }
  }
}

Ajax.prototype.doRequest = function (method, url, params)
{
  this.request.onreadystatechange = this.process;
  this.request.open(method, url, true);
  if (method == "POST")
    this.request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
  this.request.send(params);
  
  return (false);
}