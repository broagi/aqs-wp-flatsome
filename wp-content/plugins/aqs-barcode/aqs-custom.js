var qs = getUrlVars()["sn"];
console.log('params: ' + qs);
if (qs !== "" && (qs != undefined || qs != null)) {
	checkExistSN(qs);
}
function checkExistSN(sn) {
	var certificateNumber = sn;
	if (sn == "" || sn == undefined || sn == null)
		certificateNumber = document.getElementById("txtCertificateNumber").value;
	console.log('certificateNumber: ' + certificateNumber);
	var serviceURL = "https://service.aqsglobe.com/api/CusInfo/GetCustomerBySN/" + certificateNumber;
	console.log('serviceURL: ' + serviceURL);

	const XHR = new XMLHttpRequest();
	//XHR.withCredentials = true;
	XHR.responseType = 'json';
	XHR.open('POST', serviceURL, true);

	// Define what happens on successful data submission
	XHR.addEventListener('load', function (event) {
		if (this.status == 200) {
			console.log('responseText: ' + XHR.response);
			let isExpired = false;
			let companyName = XHR.response.companyName;
			let dateOfIssue = new Date(XHR.response.dateOfIssue);
			dateOfIssue = dateOfIssue.getDate() + "/" + (dateOfIssue.getMonth() + 1) + "/" + dateOfIssue.getFullYear();

			let expiresDate = new Date(XHR.response.expiresDate);
			if (expiresDate < Date.now())
				isExpired = true;//Certificate Number's customer has been expired
			expiresDate = expiresDate.getDate() + "/" + (expiresDate.getMonth() + 1) + "/" + expiresDate.getFullYear();

			let isValid = Boolean(XHR.response.isStatus)

			console.log(`Json responsed: ${companyName}, ${dateOfIssue}, ${expiresDate}`);
			var tbBody = "<tr>";
			tbBody += "<td>" + certificateNumber + "</td>";
			tbBody += "<td>" + companyName + "</td>";
			tbBody += "<td>" + Date.parse(dateOfIssue) + "</td>";
			tbBody += "<td>" + isValid + "</td>";
			tbBody += "</tr>";

			let tableRef = document.getElementById("tbResult");
			// Insert a row at the end of the table
			let newRow = tableRef.insertRow(-1);

			// Insert a cell in the row at index 0
			let newCell = newRow.insertCell(0);
			// Append a text node to the cell
			let newText = document.createTextNode(certificateNumber);
			newCell.appendChild(newText);

			// Insert a cell in the row at index 1
			newCell = newRow.insertCell(1);
			// Append a text node to the cell
			newText = document.createTextNode(companyName);
			newCell.appendChild(newText);

			// Insert a cell in the row at index 2
			newCell = newRow.insertCell(2);
			// Append a text node to the cell
			newText = document.createTextNode(dateOfIssue);
			newCell.appendChild(newText);

			// Insert a cell in the row at index 3
			newCell = newRow.insertCell(3);
			// Append a text node to the cell
			if (!isValid) {
				var strong = document.createElement("strong");
				strong.setAttribute("style", "color:red; font-weight:bold; font-size:18px;");
				strong.innerHTML = "(Chứng chỉ không còn hiệu lực)";
				newCell.appendChild(strong);
			} else {
				// newText = document.createTextNode(expiresDate);
				// newCell.appendChild(newText);
				var strong = document.createElement("strong");
				strong.setAttribute("style", "color:green; font-size:18px;");
				strong.innerHTML = "Còn hiệu lực";
				newCell.appendChild(strong);
			}

		} else {
			if (this.status == 404)
				alert('Thông tin khách hàng không tồn tại!');
			else
				alert('Đã có lỗi xảy ra, vui lòng thử lại!');
		}
	});

	// Define what happens in case of error
	XHR.addEventListener('error', function (event) {
		alert('Đã có lỗi xảy ra, vui lòng thử lại.');
	});

	// XHR.setRequestHeader('Access-Control-Allow-Headers', '*');
	// XHR.setRequestHeader('Access-Control-Allow-Origin', '*');
	XHR.setRequestHeader('Content-type', 'application/json');
	XHR.send();
}
function parse_query_string(query) {
	var vars = query.split("&");
	var query_string = {};
	for (var i = 0; i < vars.length; i++) {
		var pair = vars[i].split("=");
		var key = decodeURIComponent(pair[0]);
		var value = decodeURIComponent(pair[1]);
		// If first entry with this name
		if (typeof query_string[key] === "undefined") {
			query_string[key] = decodeURIComponent(value);
			// If second entry with this name
		} else if (typeof query_string[key] === "string") {
			var arr = [query_string[key], decodeURIComponent(value)];
			query_string[key] = arr;
			// If third or later entry with this name
		} else {
			query_string[key].push(decodeURIComponent(value));
		}
	}
	return query_string;
}
function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,
		function (m, key, value) {
			vars[key] = value;
		});
	return vars;
}