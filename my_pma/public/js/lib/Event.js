var stack = new Array();
function DocumentLoad(fct)
{
  if (typeof(fct) == "function")
    stack.push(fct);
  else
  {
    for (i = 0; i < stack.length; i++)
    {
      stack[i](fct);
    }
  }
}

function observe(element, eventType, fct, bubble)
{
	bubble = bubble || false;
	if(window.addEventListener)
		element.addEventListener(eventType, fct, bubble);
	else
		element.attachEvent("on" + type, fct);
}

function stopObserve(element, eventType, fct, bubble)
{
	bubble = bubble || false;
	if(window.addEventListener)
		element.removeEventListener(eventType, fct, bubble);
	else
		element.detachEvent("on" + type, fct);
}