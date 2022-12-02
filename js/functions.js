function getEndereco(cep) {
    var data = new Array();
    if($.trim(cep) != ""){
        var teste = $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+cep, function(response){            
            if (resultadoCEP["resultado"] != 0) {
               $("#inputBairro").val(unescape(resultadoCEP["bairro"]));
               $("#inputCidade").val(unescape(resultadoCEP["cidade"]));
               $("#selectEstado").val(unescape(resultadoCEP["uf"]));
               $('#selectEstado').selectpicker('render');
               $("#inputEndereco").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
               setCEPElements(1);
            }else{
               setCEPElements(0);
            }
        });
    }

}

function setCEPElements(ok){
    if(!ok){
        $("#inputCEP").addClass("input-warning");
        $("#cepError").addClass("input-warning").text(decodeURIComponent(escape('CEP Inválido')));
    }else{
        $("#inputCEP").removeClass("input-warning");
        $("#cepError").removeClass("input-warning").text('');
    }
}




function adjustWorkHourSlotSize(day_num) {
      $(".day"+day_num+"slot").width($(".fc-col"+day_num).width()-2);

   }

   function addWorkHours2(availablePeriods, calendar_element) {
       if (availablePeriods !== undefined) {
          numberOfAvailablePeriods =  availablePeriods.length;

          //slots.addClass('nySchedule_unavailable_slots'); 
          //iterate trough days and get avail periods for each day of week
          currentView = calendar_element.fullCalendar('getView');
          currentView =  currentView.name;
          if (currentView === 'agendaWeek' || currentView === 'agendaDay') {



            scheduleStartTime = timeToFloat(calendar_element.fullCalendar( 'option', 'minTime'));            
            scheduleSlotSize = calendar_element.fullCalendar( 'option', 'slotMinutes') /60;
            /* function to calculate slotindex for a certain time (e.g. '8:00') */    
            getSlotIndex = function(time) {
              time = timeToFloat(time);            
              return Math.round((time-scheduleStartTime)/scheduleSlotSize);
            }

            slots_content = calendar_element.find('.fc-agenda-slots tr .fc-widget-content div');
            for (var i=0; i!=numberOfAvailablePeriods; i++) {
              slots_content.addClass('unavailable');
              if (currentView === 'agendaWeek') {
                adjustWorkHourSlotSize(i);
              }

              dayPeriodsLength=availablePeriods[i].length;
              for (var j=0; j!=dayPeriodsLength; j++) {
                start=availablePeriods[i][j][0];
                end=availablePeriods[i][j][1];

                startOfPeriodSlot = getSlotIndex(timeToFloat(start));
                endOfPeriodSlot = getSlotIndex(timeToFloat(end));
                for (k=startOfPeriodSlot; k<endOfPeriodSlot; k++) {
                  slots_content.eq(k).removeClass("unavailable");
                }
              }                
            }
          }
       }
   }

   function timeToFloat(time){
    return parseInt(time);
   }