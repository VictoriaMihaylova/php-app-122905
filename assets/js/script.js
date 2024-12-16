$(document).ready(function () {
   
    window.loadCalendar = function (month = null, year = null) {
        $.ajax({
            url: '/project/handlers/calendar.php',
            type: 'GET',
            data: { month: month, year: year },
            success: function (data) {
                $('#calendar').html(data);
                markWeekendAsInactive();
                attachDateClickHandler();
                setDefaultSelectedDate();
            },
            error: function () {
                alert('Грешка при зареждане на календара.');
            }
        });
    };

    function attachDateClickHandler() {
        $('.calendar-grid .day').click(function () {
            
            if ($(this).hasClass('inactive')) {
                return;  
            }
    
            const day = $(this).text().trim();
            const monthYear = $('#calendar .calendar-header h5').text().trim();
            const [monthName, year] = parseMonthYear(monthYear);
    
           
            const monthIndex = getMonthIndex(monthName);
            const formattedDay = day.padStart(2, '0'); 
            const formattedMonth = String(monthIndex).padStart(2, '0');
            bookingDate = `${year}-${formattedMonth}-${formattedDay}`; 
            
            const selectedDate = `${day} ${monthName} ${year}`;
            
            $('#selected-date, #selected-date2').text(selectedDate);

            $('.calendar-grid .day.today').removeClass('today');
            $(this).addClass('today');
    
            onDateSelect(bookingDate);
        });
    }
    
    function getMonthIndex(monthName) {
        const months = ["януари", "февруари", "март", "април", "май", "юни", "юли", "август", "септември", "октомври", "ноември", "декември"];
        return months.indexOf(monthName) + 1;
    }

    function parseMonthYear(monthYearText) {
        const parts = monthYearText.split(' ');
        return parts.length === 2 ? [parts[0], parts[1]] : [null, null];
    }

    function markWeekendAsInactive() {
        $('.calendar-grid .day').each(function () {
            const dayOfWeek = new Date($(this).data('date')).getDay(); 

            if (dayOfWeek === 0 || dayOfWeek === 6) {
                $(this).addClass('inactive'); 
                $(this).prop('disabled', true); 
            } else {
                $(this).removeClass('inactive');
                $(this).prop('disabled', false);
            }
        });
    }

    function setDefaultSelectedDate() {
        const today = new Date();
        const day = today.getDate();
        const month = today.getMonth();
        const year = today.getFullYear();

        const monthNames = [
            "януари", "февруари", "март", "април", "май", "юни",
            "юли", "август", "септември", "октомври", "ноември", "декември"
        ];

        const monthName = monthNames[month];
        const selectedDate = `${day} ${monthName} ${year}`;

        $('#selected-date').text(selectedDate);

        $('.calendar-grid .day').each(function () {
            if ($(this).text().trim() == day && !$(this).hasClass('inactive')) {
                $(this).addClass('today');
            }
        });

        const currentDate = today.toISOString().split('T')[0];
        onDateSelect(currentDate);
    }

    loadCalendar();

    $('.btn-booking2').click(function () {
        const selectedTime = $(this).text().trim();
        
        const formattedTime = ` / ${selectedTime.replace(":", ".")} ч.`;

        $('#selected-hour').text(formattedTime);
        bookingTime = selectedTime;

        $('.btn-booking2').removeClass('btn-booking2-selected');
        $(this).addClass('btn-booking2-selected');
    });

    function onDateSelect(date) {
        $.ajax({
            url: '/project/handlers/get_booked_times.php',
            type: 'GET',
            data: { date: date },
            success: function(response) {
                const bookedTimes = JSON.parse(response);
                
                $('.btn-booking2').removeClass('btn-booking2-selected');

                $('.btn-booking2').each(function () {
                    const time = $(this).text().trim();
                    if (bookedTimes.includes(time)) {
                        $(this).prop('disabled', true).addClass('btn-disabled');
                    } else {
                        $(this).prop('disabled', false).removeClass('btn-disabled');
                    }
                });
            },
            error: function() {
                alert('Грешка при зареждане на заетите часове.');
            }
        });
    }

    function updateSelectedOption() {
        const selectedOption = document.getElementById("service_option").value;
        const optionParts = selectedOption.split('-');
    
        if (optionParts.length < 3) {
            console.error('Невалидна стойност за избора на услуга:', selectedOption);
            return;
        }
    
        const sizeId = optionParts[0];
        const price = optionParts[2];
    
        document.getElementById('selected-price').innerText = price + ' лв.';
        document.getElementById('price').value = price;
        document.getElementById('size_id').value = sizeId;
        document.getElementById('selected_date2').value = bookingDate;
        document.getElementById('selected_hour').value = bookingTime;
        
        const selectedOptionElement = document.getElementById("service_option");
        if (selectedOptionElement) {
            const selectedText = document.querySelector(`#service_option option[value="${selectedOption}"]`).textContent;
            selectedOptionElement.value = selectedOption;
            selectedOptionElement.options[selectedOptionElement.selectedIndex].text = selectedText; // Актуализира текста
        } else {
            console.error('Елемент с id "service_option" не е намерен.');
        }
        
    }

    $('#service_option').change(updateSelectedOption);

});