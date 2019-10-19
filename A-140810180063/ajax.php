<?php
//Aprischa Nauva M
if(!empty($_POST["id"])){

    include 'config.php';

    $query = $conn->query("SELECT COUNT(*) as num_rows FROM data_mahasiswa WHERE id < ".$_POST['id']." ORDER BY id DESC");
    $row = $query->fetch_assoc();
    $totalRowCount = $row['num_rows'];
    
    $showLimit = 4;
    
    $query = $conn->query("SELECT * FROM data_mahasiswa WHERE id < ".$_POST['id']." ORDER BY id DESC LIMIT $showLimit");

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
    <?php if($totalRowCount > $showLimit){ ?>
        <div class="show_more_main" id="show_more_main<?php echo $postID; ?>">
            <span id="<?php echo $postID; ?>" class="show_more" title="Load more posts">Show more</span>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>
    <?php } ?>
<?php
    }
}
?>
