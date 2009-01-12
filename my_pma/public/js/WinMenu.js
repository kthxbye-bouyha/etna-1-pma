function    MenuManager()
{
  this.menu_bar = null;
  this.initialize();
}

MenuManager.prototype.initialize = function()
{
  var menu_element = new Element($('#menu_bar'));
  this.menu_bar = menu_element.getOne(0);
  this.menu_label = menu_element.$$('.label');
  this.menu_btn = menu_element.$$('.btn');
  
  for (var i = 0; i < this.menu_label.length; i++)
  {
    observe(this.menu_label[i], 'click', this.handlerClickMenuLabel, true);
  }
  
  for (var i = 0; i < this.menu_btn.length; i++)
  {
    observe(this.menu_btn[i], 'click', this.handlerClickMenuItem, true);
  }
}
MenuManager.prototype.handlerClickMenuLabel = function(event)
{
  var menu_bar = new Element(event.currentTarget.parentNode.parentNode).$$('.menu_item');
  var sub_menu = new Element(event.currentTarget.parentNode).$$('.menu_item');
  
  for (var i = 0; i < menu_bar.length; i++)
  {
    if (sub_menu[0].isSameNode(menu_bar[i]))
    {
      if (sub_menu[0].style.display == "block")
        sub_menu[0].style.display = "none";
      else
        sub_menu[0].style.display = "block"
    }
    else
      menu_bar[i].style.display = "none";
  }
}
MenuManager.prototype.handlerClickMenuItem = function(event)
{
  event.currentTarget.parentNode.parentNode.style.display = "none";
}
