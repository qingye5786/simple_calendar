<?php
/**
 *@author 578672331@qq.com
 *@url:http://www.phpol.cn
 *@date 2015-04-13
 */
class Calendar{
	private $month;//当前的年份
	private $year;//当前的月份
	private $days;//当前月的天数
	private $start_weekday;//当前月份的第一天对应的时周几
	
	//初始化
	function __construct(){
		$this->month = isset($_GET['month']) ? $_GET['month'] : date("m");
		$this->year = isset($_GET['year']) ? $_GET['year'] : date("Y");
		$this->days = date("t",mktime(0,0,0,$this->month,1,$this->year));
		$this->start_weekday = date("w",mktime(0,0,0,$this->month,1,$this->year)); 
		}
	
		
	function display(){
		 echo "<table align='center'>";
		 $this->changeDate("index.php");
		 $this->weekList();
		 $this->daysList();
		 echo "</table>";
		 }
	 
	 //选择年月	 
	 private function changeDate($url=""){
		$a_month[1]="一月";
		$a_month[2]="二月";
		$a_month[3]="三月";
		$a_month[4]="四月";
		$a_month[5]="五月";
		$a_month[6]="六月";
		$a_month[7]="七月";
		$a_month[8]="八月";
		$a_month[9]="九月";
		$a_month[10]="十月";
		$a_month[11]="十一月";
		$a_month[12]="十二月";//一年中的月份
		echo "<tr class='top'>";
		echo "<td class='c'><a href='?".$this->preYear($this->year,$this->month)."'><img src='101.gif' /></a></td>";//上一年
		echo "<td class='c'><a href='?".$this->preMonth($this->year,$this->month)."'><img src='53.gif' /></a></td>";//上一月
		echo "<td colspan='3'>";
		echo "<form>";
		echo "<select class='year' name='year' onChange='window.location=\"".$url."?year=\"+this.options[selectedIndex].value+\"&month=".$this->month."\"'>";//选择年
		    for($sy=1970;$sy<=2038;$sy++){
				$selected = ($sy == $this->year) ? "selected" : "";
				echo '<option '.$selected.' value="'.$sy.'">'.$sy.'</option>';
			}
		echo "</select>";
		echo "<select class='month' name='month' onChange='window.location=\"".$url."?year=".$this->year."&month=\"+this.options[selectedIndex].value'>";//选择月
		    for($sm=1;$sm<=12;$sm++){
				$selected = ($sm == $this->month) ? "selected" : "";
				echo '<option '.$selected.' value="'.$sm.'">'.$a_month[$sm].'</option>';
			}
		echo "</select>";
		echo "</form>";
		echo "</td>";
		echo "<td class='c'><a href='?".$this->nextMonth($this->year,$this->month)."'><img src='54.gif' /></a></td>";//下一年
		echo "<td class='c'><a href='?".$this->nextYear($this->year,$this->month)."'><img src='102.gif' /></a></td>";//下一月
		echo "</tr>";
		}
	 
	 //显示周几
	 private function weekList(){
			$week=array('日','一','二','三','四','五','六');
			echo "<tr>";
			for($i=0; $i<count($week);$i++){
				echo "<th>".$week[$i]."</th>";
				}
			echo "</tr>";
		}
	 
	 //显示天数	
	 private function daysList(){
		     echo "<tr>";
			 //输出空格
			 for($b=0; $b<$this->start_weekday; $b++){
				 echo "<td>&nbsp;</td>";
			 }
				 
			 //输出天数
			 for($d=1; $d<=$this->days; $d++){
				 $b++;
				 if($d == date("d")){
					 echo "<td class='f'>".$d."</td>";
				 }
				 else{
					 echo "<td>".$d."</td>";	 
				 }	 
				 
				 //天数换行
				 if($b%7==0){
				 echo "</tr><tr>";	 
				 }
			 }
			 
			 echo "</tr>";
	  }
	  

		
	 
	 //上一年
	 private function preYear($year,$month){
		 $year = ($year <= 1970) ? 1970 : $year-1;
		 return  "year={$year}&month={$month}";
		 }
		 
	 //下一年
	 private function nextYear($year,$month){
		 $year = ($year >= 2038) ? 2038 : $year+1;
		 return  "year={$year}&month={$month}";
		 }
		 
	 //上一月
	 private function preMonth($year,$month){
		 if($month == 1){
			 $month = 12;
			 $year = ($year <= 1970) ? 1970 : $year-1;
		 }
		 else{
		     $month--;	 
		 }
		 return  "year={$year}&month={$month}";
		 }
		 
	 // 下一月
	 private function nextMonth($year,$month){
		 if($month == 12){
			 $month = 1;
			 $year = ($year >= 2038) ? 2038 : $year+1;
		 }else{
		     $month++;	 
		 }
		 return  "year={$year}&month={$month}";
		 }
	}