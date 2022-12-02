<?php

//ARQUIVO PARA PAGINAR, COLOQUEI DE 10 EM 10 REGISTROS

	function getPageElements($data,$page=1,$ipp){ //PEGA A VARIAVEL DA PAGINA (USUARIO), NUMERO DE PAGINAS E REGISTROS POR PAGINAS
		$elements = array_chunk($data,$ipp);
		if($page <= 0){
			$page = 1;
		}
		return  isset($elements[$page-1])?$elements[$page-1]:end($elements);
	}

	function printPaginator($data,$page,$ipp){
		empty($page)?$page=1:null;
		$lastPage=0;
		$total = count($data);

		if ($total > $ipp){
			$lastPage = (int)(($total-1)/$ipp + 1);  //Calcula numero de paginas 
		}else{
			$lastPage = 1;
		}

		echo '<div class="pag">';
		echo '<div class="" id="btnpags">';

		if($page>$lastPage){
			$page = $lastPage;
		}
		if($page<1){
			$page = 1;	
		}

		if($lastPage>10){
			$showPages = array(1,$lastPage,$page);

			$page-3>1?$showPages[]=$page-3:null;
			$page-2>1?$showPages[]=$page-2:null;
			$page-1>1?$showPages[]=$page-1:null;
			$page+1<$lastPage?$showPages[]=$page+1:null;
			$page+2<$lastPage?$showPages[]=$page+2:null;
			$page+3<$lastPage?$showPages[]=$page+3:null;
			sort($showPages);
			$showPages = array_unique($showPages);
			$showPages = array_values($showPages);

			for($i=0;$i<count($showPages);$i++){
				
				$lastValue = isset($showPages[$i-1])?$showPages[$i-1]:null;

				if ($page==$showPages[$i]){
					echo '<a href="" class="btn btn-mini btn-primary">'.$showPages[$i].'</a>';
				}else{
					if($lastValue+1!=$showPages[$i]){
						echo "<span style='width:20px;display:inline-block'>&hellip;</span>";
					}
					echo '<a class="btn btn-mini" href="'.assembleUrlLink($showPages[$i],$ipp).'">'.$showPages[$i].'</a>';
				}
			}

		}else{

			for($i=1;$i<=$lastPage;$i++){
				if ($page==$i){
					echo '<a href="" class="btn btn-mini btn-primary">'.$i.'</a>';
				}else{
					echo '<a class="btn btn-mini" href="'.assembleUrlLink($i,$ipp).'">'.$i.'</a>';
				}
			}
		}

		echo '</div></div>';
	}

	function printThemedPaginator($data,$page,$ipp,$ppData){
		empty($page)?$page=1:null;
		$lastPage=0;
		$total = count($data);

		if ($total > $ipp){
			$lastPage = (int)(($total-1)/$ipp + 1); 
		}else{
			$lastPage = 1;
		}

		echo '<div class="pag">';
		echo '<div class="">';

		if($page>$lastPage){
			$page = $lastPage;
		}

		for($i=1;$i<=$lastPage;$i++){
			if ($page==$i){
				isset($ppData['tema_btn'])?$attr = $ppData['tema_btn']:$attr ='btn-primary';
				echo '<a href="" class="btn btn-mini '.$attr.' ">'.$i.'</a>';
			}else{
				echo '<a class="btn btn-mini" href="'.assembleUrlLink($i,$ipp).'">'.$i.'</a>';
			}
		}
	}

	function assembleUrlLink($page,$ipp){
		$url = $_SERVER['PHP_SELF'].'?';
		$_GET['ipp']=$ipp;
		$_GET['page']=$page;
			foreach($_GET as $key => $value){
				$url.=$key.'='.$value.'&';
			}

		return $url;
	}
?>