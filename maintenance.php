<?php /* Template Name: Maintenance */ ?>
<html><head>
<title>CK Works</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<style>
			body {
				background-color: #1a235b;
			}

			body,
			h1,
			p {
				font-family: "Helvetica Neue", "Segoe UI", Segoe, Helvetica, Arial, "Lucida Grande", sans-serif;
				font-weight: normal;
				margin: 0;
				padding: 0;
				text-align: center;
				color: #c0c3d7;
			}

			strong {
				color: #fff;
			}

			.container {
				margin-left: auto;
				margin-right: auto;
				margin-top: 40px;
				max-width: 1170px;
				padding-right: 15px;
				padding-left: 15px;
			}

			.row:before,
			.row:after {
				display: table;
				content: " ";
			}

			h1 {
				font-size: 30px;
				margin: 0 0 15px 0;
				font-weight: 400;
				color: #fff;
			}

			.lead {
				font-size: 16px;
				font-weight: 200;
				margin-bottom: 30px;
			}

			p {
				margin: 0 0 10px;
			}

			a {
				color: #3282e6;
				text-decoration: none;
			}

			.request {
				background: #1e275f;
				padding: 15px;
				border-radius: 15px;
				text-align: left;
				margin: 0 auto;
				box-shadow: 4px 4px 20px rgba(0, 0, 0, .2);
				max-width: 460px;
				width: auto;
				position: relative;
			}

			.request * {
				font-size: 12px !important;
				text-align: left;
				line-height: 20px;
				margin: 0;
			}

			.output-console {
				margin-top: 20px;
				border-radius: 5px;
				padding: 10px;
				background-color: #1a235b;
				overflow: hidden;
				max-height: 200px;
				box-sizing: border-box;
				text-align: left;
			}

			.output-console p,
			.output-console span {
				text-align: left;
				color: #c0c3d7
			}
		</style>
</head>
<body>
<div class="container text-center" id="error">
<div class="row">
<div class="col-md-12">
<div class="main-icon text-success">
<span class="uxicon uxicon-clock-refresh"></span>
</div>
<h1>We’ll be back soon!</h1>
<p class="lead" style="max-width: 368px; margin:0 auto 30px">We’re performing some maintenance at the moment. If you are a <strong>visitor</strong>, check back soon. </p>
<div class="request">
<p class="lead">Your Request Path: <strong> GET </strong>
</p>
<p class="lead">Your Default IP address is: <strong> 88.99.150.47 </strong>
</p>
<p class="lead">Your IP Port address is: <strong> 80 </strong>
</p>
<p class="lead">Your Proxy IP address is: <strong> 172.71.250.95 </strong>
</p>
<p class="lead">Your Proxy IP Port address is: <strong> 45912 </strong>
</p>
<p class="lead">Your Continent: <strong id="continent"></strong>
</p>
<p class="lead">Your Country: <strong id="country"></strong>
</p>
<p class="lead">Your Region: <strong id="region"></strong>
</p>
<p class="lead">Your City: <strong id="state"></strong>
</p>
<p class="lead">Your County: <strong id="county"></strong>
</p>
<p class="lead">Your Suburb: <strong id="suburb"></strong>
</p>
<p class="lead">Your Postal Code: <strong id="postalCode"></strong>
</p>
<p class="lead">Your Road Type: <strong id="road_type"></strong>
</p>
<p class="lead">Your Latitude: <strong id="latitude"></strong>
</p>
<p class="lead">Your Longitude: <strong id="longitude"></strong>
</p>
<p class="lead">Your Browser Detail is: <strong> Mozilla/5.0 (compatible; AwarioBot/1.0; +https://awario.com/bots.html) </strong>
</p>
<div class="output-console"><p>....Searching...</p><span></span><p>Authorized...</p><span></span><p>Encryption Unsuccesful Attempting Retry...</p><span></span><p>Entering Location http://ck.works/?timing=1ww</p><p>Going Deeper....</p><p>Encryption Unsuccesful Attempting Retry...</p><p>Compression Complete.</p><span></span><p>Entering Location TPS Reports</p><p>Encryption Unsuccesful Attempting Retry...</p><p>Access Granted..</p><p>Entering Security Console...</p><p>Entering Security Console...</p><p>Authorized...</p><p>Waiting for response...</p><p>Encryption Unsuccesful Attempting Retry...</p><span></span><p>Waiting for response...</p><span></span><p>Compilation Started of Data Structure</p><p>Calculating Space Requirements </p><p>Compression Complete.</p><p>Going Deeper....</p><p>Performing DNS Lookups forhttp://ck.works/?23&amp;88&amp;far=2</p><p>Waiting for response...</p><span></span><p>Encryption Unsuccesful Attempting Retry...</p><span></span><p>Encryption Unsuccesful Attempting Retry...</p><span></span><p>Authorizing </p><span></span><p>Waiting for response...</p><span></span><p>....Searching...</p><span></span><p>Encryption Unsuccesful Attempting Retry...</p><span></span><p>....Searching...</p><span></span><p>Searching http://ck.works?au&amp;2</p><p>Compilation of Data Structures Complete..</p><p>Access Granted..</p><p>....Searching...</p><p>Entering Security Console...</p><span></span><p>Access Granted..</p><span></span><p>tar -xzf http://ck.works/?timing=1ww</p><p>Going Deeper....</p></div>
</div>
</div>
</div>
<script>
				if (navigator.geolocation) {} else {
					alert("Tarayıcınız konum servisini desteklemiyor.");
				}

				function showPosition(position) {
					var latitude = position.coords.latitude;
					var longitude = position.coords.longitude;
					var apiKey = 'db979b64ac574142b724162bab8fd625';
					var apiUrl = 'https://api.opencagedata.com/geocode/v1/json?q=' + latitude + '+' + longitude + '&key=' + apiKey;
					fetch(apiUrl).then(response => response.json()).then(data => {
						var continent = data.results[0].components.continent;
						document.getElementById("continent").textContent = continent;
						var country = data.results[0].components.country;
						document.getElementById("country").textContent = country;
						var region = data.results[0].components.region;
						document.getElementById("region").textContent = region;
						var state = data.results[0].components.state;
						document.getElementById("state").textContent = state;
						var county = data.results[0].components.county;
						document.getElementById("county").textContent = county;
						var suburb = data.results[0].components.suburb;
						document.getElementById("suburb").textContent = suburb;
						var postalCode = data.results[0].components.postcode;
						document.getElementById("postalCode").textContent = postalCode;
						var road_type = data.results[0].components.road_type;
						document.getElementById("road_type").textContent = road_type;
						document.getElementById("latitude").textContent = latitude;
						document.getElementById("longitude").textContent = longitude;
					});
				}
				var outputConsole = document.querySelector(".output-console");
				var commandStart = ['Performing DNS Lookups for', 'Searching ', 'Analyzing ', 'Estimating Approximate Location of ', 'Compressing ', 'Requesting Authorization From : ', 'wget -a -t ', 'tar -xzf ', 'Entering Location ', 'Compilation Started of ', 'Downloading '],
					commandParts = ['Data Structure', 'http://ck.works?au&2', 'Texture', 'TPS Reports', ' .... Searching ... ', 'http://ck.works/?23&88&far=2', 'http://ck.works/?timing=1ww'],
					commandResponses = ['Authorizing ', 'Authorized...', 'Access Granted..', 'Going Deeper....', 'Compression Complete.', 'Compilation of Data Structures Complete..', 'Entering Security Console...', 'Encryption Unsuccesful Attempting Retry...', 'Waiting for response...', '....Searching...', 'Calculating Space Requirements '],
					isProcessing = false,
					processTime = 0,
					lastProcess = 0;

				function consoleOutput() {
					var textEl = document.createElement('p');
					if (isProcessing) {
						textEl = document.createElement('span');
						// textEl.textContent += Math.random() + " ";
						if (Date.now() > lastProcess + processTime) {
							isProcessing = false;
						}
					} else {
						var commandType = ~~(Math.random() * 4);
						switch (commandType) {
							case 0:
								textEl.textContent = commandStart[~~(Math.random() * commandStart.length)] + commandParts[~~(Math.random() * commandParts.length)];
								break;
							case 3:
								isProcessing = true;
								processTime = ~~(Math.random() * 2);
								lastProcess = Date.now();
							default:
								textEl.textContent = commandResponses[~~(Math.random() * commandResponses.length)];
								break;
						}
					}
					outputConsole.scrollTop = outputConsole.scrollHeight;
					outputConsole.appendChild(textEl);
					if (outputConsole.scrollHeight > window.innerHeight) {
						var removeNodes = outputConsole.querySelectorAll('*');
						for (var n = 0; n < ~~(removeNodes.length / 3); n++) {
							outputConsole.removeChild(removeNodes[n]);
						}
					}
					setTimeout(consoleOutput, ~~(Math.random() * 200));
				}
				setTimeout(function() {
					consoleOutput();
				}, 200);
			</script>

</div></body></html>