<div class="panel-body ranking-box">
    <table class="table">
	    <thead>
	        <tr>
	        	<th>Smart Goals</th>
	        	<th>Keep</th>
	        	<th></th>
            </tr>
       </thead>
       <tbody>
           <?php foreach($goals as $goal): ?>
            <tr>
                <td id=targetID>{{ $goal->content }}</td>
                <td>@include('good_user.good_button')</td>
                <td><button id='btnCopy' class="btn"><span class='glyphicon glyphicon-copy'> copy</span></button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
   </table>
</div>

<script>
    document.querySelector('#btnCopy').addEventListener("click", function(){
      var element = document.querySelector('#targetID');
      var selection = window.getSelection();
      var range = document.createRange();
      range.selectNodeContents(element);
      selection.removeAllRanges();
      selection.addRange(range);
      //console.log('選択された文字列: ', selection.toString());
      var succeeded = document.execCommand('copy');
      if (succeeded) {
          alert('コピーが成功しました！');
      } else {
          alert('コピーが失敗しました!');
      }
      selection.removeAllRanges();
    
    });
</script>