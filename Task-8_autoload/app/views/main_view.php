<?php
	$connect = mysqli_connect("localhost", "root", "", "tasklist");
	$user_id = $_SESSION['user']['id'];
?>
<div class="container">
		<div class="tasklist_add">
			<form action="/main/add_task" method="POST" class="tasklist_add_block">
				<input type="text" name="add_text" class="add_text">
				<input type="submit" name="add_sub" value="Добавить" class="add_sub">
			</form>
			<div class="tasklist_add_block">		
				<a href='/main/remove_all/?user_id=<?=$user_id?>' class='tasklist_btn'>Удалить все</a>
				<a href="/main/ready_all/?user_id=<?=$user_id?>" class='tasklist_btn'>Выполнить все</a>
				<a href='/main/exit' class='tasklist_btn'>Выйти</a>
		
			</div>
		</div>

		<?php
			echo $_SESSION['mess'];
			unset($_SESSION['mess']);
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		?>

		<div class="tasklist">
			<?php
				$str_out_tasks = "SELECT * FROM `tasks` WHERE user_id = '$user_id'";
				$run_out_tasks = mysqli_query($connect, $str_out_tasks);
				
				while ($out_tasks = mysqli_fetch_array($run_out_tasks)) {

					if ($out_tasks['status'] == 1) {
						$status_text = "Выполнено";
						$img = "<img src='/img/no.png' alt=''>";
					} elseif ($out_tasks['status'] == 2) {
						$status_text = "Не выполнено";
						$img = "<img src='/img/yes.png' alt=''>";
					}

					echo "
						<div class='tasklist_items'>
							<div class='tasklist_item'> 
									<p class='tasklist_item_text'>$out_tasks[description]</p>
									<div class='tasklist_item_btn'>
										<a href='/main/status/?status_id=$out_tasks[id]' class='tasklist_btn'>$status_text</a>
										<a href='/main/delete/?delete_id=$out_tasks[id]' class='tasklist_btn'>Удалить</a>
									</div>
							</div>
							<div class='tasklist_status_img'>
								$img
							</div>
						</div>
					";
				}
			?>
			
		</div>
	</div>