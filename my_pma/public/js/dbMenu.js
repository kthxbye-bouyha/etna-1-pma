function menuHandler(event)
{
  url = "/" + relative_root + "/db/struct?db_selected=";
  
  select = $('#db_selector');
  for (i = 0; i < select.options.length; i++)
  {
    if (select.options[i].selected)
      document.location = url + select.options[i].value;
  }
}