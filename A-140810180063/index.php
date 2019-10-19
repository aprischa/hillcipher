<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','.expand',function(){
            var ID = $(this).attr('id');
            $('.expand').hide();
            $('.loding').show();
            $.ajax({
                type:'POST',
                url:'ajax_more.php',
                data:'id='+ID,
                success:function(html){
                    $('#expand_main'+ID).remove();
                    $('.postList').append(html);
                }
            });
        });
    });
    </script>
</head>

<body>
	<table width=100% class="list_item">
		<tr>
			<th>Nama</th>
			<th>NPM</th>
			<th>Jurusan</th>
		</tr>
    </table>
	
    <div class="postList">
        <?php
        include 'config.php';
        $query = $conn->query("SELECT * FROM data_mahasiswa ORDER BY id DESC LIMIT 3");
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                $postID = $row['id'];
        ?>
		<table width=100% class="list_item">
		<tr>
			<td><?php echo $row['nama_mhs']?></td>
			<td><?php echo $row['npm']?></td>
			<td><?php echo $row['jurusan']?></td>
		</tr>
		</table>
        <?php } ?>
        <div class="expand_main" id="expand_main<?php echo $postID; ?>">
                <span id="<?php echo $postID; ?>" class="expand" title="Load more posts">Expand</span>
                <span class="loding" style="display: none;"><span class="loding_txt">Please wait...</span></span>
        </div>
        <?php } ?>
    </div>
</body>