<?php 
$prenom= explode(".", $_SESSION['mail']);
$rest = $prenom[1];
$nom = explode("@", $rest);
echo "Bienvenue ".ucfirst($prenom[0])." ".strtoupper($nom[0])." élève de ".$class['className'];
var_dump($tache);
var_dump($_SESSION);
?>
<div class="container">
    <hr>
	<div id="calendar"></div>
</div>

<script>
$.getScript('http://arshaw.com/js/fullcalendar-1.6.4/fullcalendar/fullcalendar.min.js',function(){
  
  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();
  
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    editable: true,
	<?php foreach($events as $key=>$events)
	{
	?>
    events: [
      {
        title: <?php //echo $events["title"]?>,
        start: <?php //echo $events["date"] ?>
      }
    ]
	<?php } ?>
  });
})
</script>
