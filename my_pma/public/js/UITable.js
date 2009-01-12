//DocumentLoad(init);
DocumentLoad(init);
function    init()
{
  adjustSize();
  //adjust canvas size for screen
  tableManager = new TableManager();
  tableManager.populate();
  tableManager.drawRelationships();
  observe($('#saveSchema'), 'click', handlerClickSaveSchema, false);
  /*
  menuManager = new MenuManager();
  observe($('#burstSchema'), 'click', handlerClickBurstSchema, false);
  observe($('#drawRelationships'), 'click', handlerClickDrawRelationship, false);
  */
}
function    handlerClickSaveSchema(event)
{
  var data = tableManager.saveSchema();
  var request = new Ajax();
  url = "/" + relative_root + "/visualization/save";
  request.doRequest("POST", url, data);
}
function    handlerClickBurstSchema(event)
{
  tableManager.burstSchema();
}
function    handlerClickDrawRelationship(event)
{
  adjustSize();
  tableManager.drawRelationships();
}

function    debug(obj)
{
  var output = "";
  for (param in obj)
    output = output + param + "\nhttp://localhost:8080/pma/#";
  alert(output);
}