<?php
$this->setLayoutVar('pageTitle', 'API - The Open Beer Database');
?>
<h1>The API</h1>
<p>
	This is a starting point. From here, I'm hoping the conversation will remain active and we can continue building
	functionality. This is by no means the finished product, nor should this be used in production. The whole API, 
	while in development, is subject to change at any time. You've been warned.
</p><p>	
	I've decided to serve responses in JSON. This isn't set in stone, nor is anything else. It just
	happens to be what I prefer using and is a format that has become fairly ubiquitous. 
</p><p>
	The base API URL is: obdb-dev-hoke.apigee.com
</p><p>
	If you're wondering what Apigee is, check it out <a href="http://www.apigee.com" target="_new">here</a>. 
	It will help with debugging any issues that arise down the road and allow me to track traffic. 
</p><p>
	<strong class="red">*NOTE* - Holy, sweet, merciful {deity of choice}, DO NOT use this DEVELOPMENT API in PRODUCTION software.</strong>
</p>


<h1>Resources</h1>
<div id="resources">
	<!-- Beers -->
	<div class="resource">
		<h2>Beers</h2>
		<!-- list -->
		<div class="function">
			<h3>list</h3>
			<div class="expanding">
				<div class="descript">
					Returns a list of beers, ordered by id, in JSON format. 
				</div>
				<h4>Parameters</h4>
				<div class="params">
					<div class="param">limit - (optional) limits the amount of results returned. default: 50</div>
					<div class="param">offset - (optional) offsets the result set returned. default: 0</div>
				</div>
				<h4>Example</h4>
				<div class="example">
					{api_url}/beers/list<br/>
					{api_url}/beers/list?limit={limit}&offset={offset}
				</div>
			</div>
		</div>
		<!-- get -->
		<div class="function">
			<h3>get</h3>
			<div class="expanding">
				<div class="descript">
					Returns a beer, or list of beers, ordered by id, in JSON format. Supplying only one of 
					the three parameters is required.
				</div>
				<h4>Parameters</h4>
				<div class="params">
					<div class="param">id - the desired beer's id</div>
					<div class="param">name - the desired beer's name</div>
					<div class="param">brewery_id - the desired beers' brewery, by id</div>
				</div>
				<h4>Example</h4>
				<div class="example">
					{api_url}/beers/get?id={id}<br/>
					{api_url}/beers/get?name={name}<br/>
					{api_url}/beers/get?brewery_id={brewery_id}
				</div>
			</div>
		</div>
		<!-- search -->
        <div class="function">
            <h3>search</h3>
            <div class="expanding">
                <div class="descript">
                    Returns a beer, or list of beers, ordered by id, in JSON format. Supplying name is required.
                </div>
                <h4>Parameters</h4>
                <div class="params">
                    <div class="param">type - the type of search: 'starts_with' or 'contains'. default: 'starts_with'</div>
                    <div class="param">name - the beer name search string</div>
                </div>
                <h4>Example</h4>
                <div class="example">
                    {api_url}/beers/search?name={name}<br/>
                    {api_url}/beers/search?type={type}&name={name}<br/>
                </div>
            </div>
        </div>
	</div>
	<!-- Breweries -->
	<div class="resource">
		<h2>Breweries</h2>
		<!-- list -->
		<div class="function">
			<h3>list</h3>
			<div class="expanding">
				<div class="descript">
					Returns a list of breweries, ordered by id, in JSON format. 
				</div>
				<h4>Parameters</h4>
				<div class="params">
					<div class="param">limit - (optional) limits the amount of results returned. default: 50</div>
					<div class="param">offset - (optional) offsets the result set returned. default: 0</div>
				</div>
				<h4>Example</h4>
				<div class="example">
					{api_url}/breweries/list<br/>
					{api_url}/breweries/list?limit={limit}&offset={offset}
				</div>
			</div>
		</div>
		<!-- get -->
		<div class="function">
			<h3>get</h3>
			<div class="expanding">
				<div class="descript">
					Returns a brewery, ordered by id, in JSON format. Supplying only one of 
					the two parameters is required.
				</div>
				<h4>Parameters</h4>
				<div class="params">
					<div class="param">id - the desired brewery's id</div>
					<div class="param">name - the desired brewery's name</div>
				</div>
				<h4>Example</h4>
				<div class="example">
					{api_url}/breweries/get?id={id}<br/>
					{api_url}/breweries/get?name={name}<br/>
					{api_url}/breweries/get?brewery_id={brewery_id}
				</div>
			</div>
		</div>
	</div>
	<!-- Categories -->
	<div class="resource">
		<h2>Categories</h2>
		<!-- list -->
		<div class="function">
			<h3>list</h3>
			<div class="expanding">
				<div class="descript">
					Returns a list of categories, ordered by id, in JSON format. 
				</div>
				<h4>Parameters</h4>
				<div class="params">
					<div class="param">limit - (optional) limits the amount of results returned. default: 50</div>
					<div class="param">offset - (optional) offsets the result set returned. default: 0</div>
				</div>
				<h4>Example</h4>
				<div class="example">
					{api_url}/categories/list<br/>
					{api_url}/categories/list?limit={limit}&offset={offset}
				</div>
			</div>
		</div>
		<!-- get -->
		<div class="function">
			<h3>get</h3>
			<div class="expanding">
				<div class="descript">
					Returns a category, ordered by id, in JSON format. Supplying only one of 
					the two parameters is required.
				</div>
				<h4>Parameters</h4>
				<div class="params">
					<div class="param">id - the desired category's id</div>
					<div class="param">name - the desired category's name</div>
				</div>
				<h4>Example</h4>
				<div class="example">
					{api_url}/categories/get?id={id}<br/>
					{api_url}/categories/get?name={name}<br/>
					{api_url}/categories/get?brewery_id={brewery_id}
				</div>
			</div>
		</div>
	</div>
	<!-- Styles -->
	<div class="resource">
		<h2>Styles</h2>
		<!-- get -->
		<div class="function">
			<h3>get</h3>
			<div class="expanding">
				<div class="descript">
					Returns a style, or list of styles, ordered by id, in JSON format. Supplying only one of 
					the three parameters is required.
				</div>
				<h4>Parameters</h4>
				<div class="params">
					<div class="param">id - the desired style's id</div>
					<div class="param">name - the desired style's name</div>
					<div class="param">category_id - the desired styles' category, by id</div>
				</div>
				<h4>Example</h4>
				<div class="example">
					{api_url}/style/get?id={id}<br/>
					{api_url}/style/get?name={name}<br/>
					{api_url}/style/get?category_id={category_id}
				</div>
			</div>
		</div>
	</div>
	<!--  -->
</div>
<script type="text/javascript">
$(document).ready(function() {
	$(".function").click(function () {
		$(".expanding", this).toggle("slow");
	});
});
</script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-16271718-1");
pageTracker._trackPageview();
} catch(err) {}</script>