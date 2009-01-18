function main()
{
	odd();
	if ($("#db_content") == null)
		document.body.appendChild(createElement('db_content', 'bordered'));
	if ($("#table_content") == null)
		document.body.appendChild(createElement('table_content', 'bordered'));
	if ($("#row_content") == null)
		document.body.appendChild(createElement('row_content', 'bordered'));
}
function createElement(id, className)
{
	elem = document.createElement("div");
	elem.setAttribute('id', id);
	elem.setAttribute('class', className);
	elem.style.display = 'none';
	return (elem);
}
function odd()
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


DocumentLoad(main);