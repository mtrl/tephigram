</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
		integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
		crossorigin="anonymous"></script>
<script src="js/jquery.bxslider.min.js"></script>
<?php if ( isset($additional_js) ) {
	foreach ( $additional_js as $js ): ?>
		<script src="js/<?php echo $js ?>"></script>
	<?php endforeach;
} ?>
</body>
</html>
