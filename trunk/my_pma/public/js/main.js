DocumentLoad(main);
function main()
{
	table = document.getElementsByTagName("tr");
	for (i = 0; i < table.length; i++)
	{
		className = table[i].parentNode.parentNode.getAttribute("class");
		if (className != null)
		{
			if (i % 2 != 1)
				table[i].setAttribute("class", "odd_row");
		}
	}
}
function debug(obj)
{
		params = "";
		for (param in obj)
			params = params + param + "\n";
		alert(params);
}

