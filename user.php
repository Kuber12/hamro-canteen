<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Print</title>
</head>
<style>
    #printable_div_id{
        height:200px;
        width:400px;
        position : absolute;
        top:50%;
        left:50%;
        transform: translate(-50%, -50%); /* to center the div horizontally */
        border: solid black 1px;
        padding: 1em;
        text-align:center;
        font-size:large;
        color: red;
    
    }
</style>
<body>

  <div style="width: 15%; background-color: #1f386a; margin:50px 0;">
    <a href="https://www.buildwithphp.com/">
      <img src="https://www.buildwithphp.com/front/images/logo.webp" width="100%">
    </a>
  </div>

	<div id='printable_div_id'>
        <table border=1px>
           <tr>
            <th>head</th>
            <th>head</th>
           </tr>
           <tr>
            <td>dslf</td>
            <td>dslf</td>
           </tr>
        </table>
		<h1>Printable Content</h1>
		<p>This is a printable paragraph.</p>
	</div>

  <div>
    <h1>Outside Printable Content</h1>
    <p>This is not a printable paragraph.</p>
  </div>

	<button onClick="printdiv('printable_div_id');">PRINT</button>



<script>
function printdiv(elem) {
  var header_str = '<html><head><title>' + document.title  + '</title></head><body>';
  var footer_str = '</body></html>';
  var new_str = document.getElementById(elem).innerHTML;
  var old_str = document.body.innerHTML;
  document.body.innerHTML = header_str + new_str + footer_str;
  window.print();
  document.body.innerHTML = old_str;
  return false;
}
</script>

</body>
</html> -->