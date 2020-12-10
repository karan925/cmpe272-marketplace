<!DOCTYPE html>
<html>
<header>
	<h1> Submit a Review </h1>
</header>
<body>
	<form id="reviewForm">
		<div class="input-group mb-3">
		<label for="ratings">Please Choose a Rating</label>
		<input type="radio" name="ratings" id="one" value="one">
		<label for="one">One</label>
		<input type="radio" name="ratings" id="two" value="two">
		<label for="two">Two</label>
		<input type="radio" name="ratings" id="three" value="three">
		<label for="three">Three</label>
		<input type="radio" name="ratings" id="four" value="four">
		<label for="four">Four</label>
		<input type="radio" name="ratings" id="five" value="five">
		<label for="five">Five</label>
		<br>
		<label for="review"><Strong>Please Submit a Review</Strong></label>
		<textarea form="reviewForm" rows="4" cols="50" name="review" id="review">
			Enter Review Here. 	
		</textarea>	
		<input type="submit"> 
	</form>
</body>
</html>
