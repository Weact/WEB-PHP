var hasChanged = 1;

function zoomTable()
{
	var divTable = document.getElementById('table-container-div');
	var divTableWidth = divTable.clientWidth;
	var divTableHeight = divTable.clientHeight;

	var tableTH = document.getElementsByTagName('th');
	var tableTD = document.getElementsByTagName('td');

	if(hasChanged == 1)
	{
		divTable.style.width = divTableWidth*1.45 + "px";
		divTable.style.height = divTableHeight*1.45 + "px";
		for (var i = 0; i < tableTH.length; i++) {
			tableTH[i].style.fontSize = "35px";
		}
		for (var j = 0; j < tableTD.length; j++) {
			tableTD[j].style.fontSize = "30px";
		}
		document.getElementById('btn-zoom-table').value = "DEZOOOM";
		hasChanged = 0;
	}else{
		divTable.style.width = divTableWidth/1.45 + "px";
		divTable.style.height = divTableHeight/1.45 + "px";
		for (var x = 0; x < tableTH.length; x++) {
			tableTH[x].style.fontSize = "20px";
		}
		for (var y = 0; y < tableTD.length; y++) {
			tableTD[y].style.fontSize = "20px";
		}
		document.getElementById('btn-zoom-table').value = "ZOOOM";
		hasChanged = 1;
	}

}