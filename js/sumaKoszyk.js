function sumuj()
{
	var sum = 0;

	var cells = document.querySelectorAll("td:nth-child(3)");

	for (var i = 0; i < cells.length; i++)
	{
		sum+=parseFloat(cells[i].firstChild.data);
	}
	var div = document.getElementById("div");
	var sumaDiv = document.createElement("div");
	var sumaDivText = document.createTextNode(sum);
	sumaDiv.appendChild(sumaDivText);
	div.appendChild(sumaDiv);
}