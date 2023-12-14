
let body = document.querySelector('body');
let frameMask = document.createElement('div');
frameMask.classList.add('frame-mask');
body.appendChild(frameMask);
let isOpen = false;
let lastChoose;
let lastChooseDate;
let inputArea = document.querySelectorAll('.input-area');
let neverChooseDay = true;
let isNowButton = false;
inputArea.forEach((item, index) => {
    getDateControl(item, index);
});
function getDateControl(inputArea, inputAreaIndex) {
    let datePickerBox = inputArea.querySelector('.date-container');
    const container = datePickerBox.querySelector('.datePicker');
    const datepicker = new TheDatepicker.Datepicker(null, container);
    datepicker.options.setFirstDayOfWeek(
        TheDatepicker.DayOfWeek.Sunday
    );

    datepicker.options.translator.setMonthTranslation(TheDatepicker.Month.January, "一月");
    datepicker.options.translator.setMonthTranslation(TheDatepicker.Month.February, "二月");
    datepicker.options.translator.setMonthTranslation(TheDatepicker.Month.March, "三月");
    datepicker.options.translator.setMonthTranslation(TheDatepicker.Month.April, "四月");
    datepicker.options.translator.setMonthTranslation(TheDatepicker.Month.May, "五月");
    datepicker.options.translator.setMonthTranslation(TheDatepicker.Month.June, "六月");
    datepicker.options.translator.setMonthTranslation(TheDatepicker.Month.July, "七月");
    datepicker.options.translator.setMonthTranslation(TheDatepicker.Month.August, "八月");
    datepicker.options.translator.setMonthTranslation(TheDatepicker.Month.September, "九月");
    datepicker.options.translator.setMonthTranslation(TheDatepicker.Month.October, "十月");
    datepicker.options.translator.setMonthTranslation(TheDatepicker.Month.November, "十一月");
    datepicker.options.translator.setMonthTranslation(TheDatepicker.Month.December, "十二月");

    datepicker.options.translator.setDayOfWeekTranslation(TheDatepicker.DayOfWeek.Monday, "一");
    datepicker.options.translator.setDayOfWeekTranslation(TheDatepicker.DayOfWeek.Tuesday, "二");
    datepicker.options.translator.setDayOfWeekTranslation(TheDatepicker.DayOfWeek.Wednesday, "三");
    datepicker.options.translator.setDayOfWeekTranslation(TheDatepicker.DayOfWeek.Thursday, "四");
    datepicker.options.translator.setDayOfWeekTranslation(TheDatepicker.DayOfWeek.Friday, "五");
    datepicker.options.translator.setDayOfWeekTranslation(TheDatepicker.DayOfWeek.Saturday, "六");
    datepicker.options.translator.setDayOfWeekTranslation(TheDatepicker.DayOfWeek.Sunday, "日");

    datepicker.options.setDaysOutOfMonthVisible(true);
    datepicker.render();

    const dateBox = container.children[0].children[1];
    let timeList = inputArea.querySelector('ul.time-list');
    timeList.style.height = `${dateBox.offsetHeight - 32}px`;
    dateBox.appendChild(timeList);
    let timeListItem = timeList.querySelectorAll('li');
    let defaultDate = new Date();

    let setYear = defaultDate.getFullYear();
    let setMonth = defaultDate.getMonth() + 1;
    let setDay = defaultDate.getDate();


    let defaultHours = defaultDate.getHours();
    let defaultMinutes = defaultDate.getMinutes() + 30; //預設往後推30分鐘
    if (defaultMinutes > 30) {
        defaultMinutes = 0;
        defaultHours += 1;
    } else if (defaultMinutes < 30 && defaultMinutes != 0) {
        defaultMinutes = 30;
    }
    if (defaultHours === 24) {
        defaultHours = 0;
        setDay = defaultDate.getDate() + 1;
    }
    if (defaultHours < 10) {
        defaultHours = `0${defaultHours}`;
    }
    if (defaultMinutes < 10) {
        defaultMinutes = `0${defaultMinutes}`;
    }
    let setTime = `${defaultHours}:${defaultMinutes}`;
    // 預設為今天
    datepicker.selectDate(`${setYear}-${setMonth}-${setDay}`);


    let lastChooseItemIndex = null;
    let needScroll = 0;
    timeListItem.forEach((liItem, liIndex) => {
        if (liItem.textContent === setTime) {
            lastChooseItemIndex = liIndex;
            liItem.classList.add('active');
            needScroll = liItem.offsetTop - (timeList.offsetHeight / 2) + (liItem.offsetHeight / 2);
            if (needScroll) {
                timeList.scrollTop = needScroll;
            }
        }
        liItem.addEventListener('click', () => {
            chooseTime(liItem);
            lastChooseItemIndex = liIndex;
        });
    });
    // 初始化完畢
    datePickerBox.style.display = 'none';
    function chooseTime(liItem) {
        setTime = liItem.textContent;
        if (lastChooseItemIndex !== null) {
            timeListItem[lastChooseItemIndex].classList.remove('active');
        }
        liItem.classList.add('active');
        needScroll = liItem.offsetTop - (timeList.offsetHeight / 2) + (liItem.offsetHeight / 2);
        if (needScroll) {
            timeList.scrollTop = needScroll;
        }

        inputBox.value = `${setYear}-${setMonth}-${setDay} ${setTime}`;

    }
    let inputBox = inputArea.querySelector('.input-box');
    inputBox.addEventListener('click', () => {
        if (!isOpen) {
            datePickerBox.style.display = 'block';
            frameMask.style.display = 'block';
        }
        isOpen = !isOpen;
        if (inputBox.id === 'start-time-input') {
            if (isNowButton) {
                datepicker.selectDate(`${lastChooseDate[0]}-${lastChooseDate[1]}-${lastChooseDate[2]}`);
            }
        }
        if (inputBox.id === 'end-time-input') {
            if (lastChoose) {
                datepicker.options.addCellClassesResolver(function (day) {
                    if ((day.year === lastChooseDate[0]) && (day.month === lastChooseDate[1]) && (day.dayNumber === lastChooseDate[2])) {
                        setYear = day.year;
                        setMonth = day.month;
                        setDay = day.dayNumber;
                        return ['next-color'];
                    }
                });
                datepicker.render();
            }
        }
    });
    datepicker.options.onSelect(function (event, day, previousDay) {
        isNowButton = false;
        neverChooseDay = false;
        setYear = day.year;
        setMonth = day.month;
        setDay = day.dayNumber;
        inputBox.value = `${setYear}-${setMonth}-${setDay} ${setTime}`;
        if (this.container.id === 'datePickerStart') {

            let allChoose = document.querySelectorAll('.the-datepicker__cell span');
            allChoose.forEach((n) => {
                let haveClass = n.classList.contains('color');
                if (haveClass) {
                    n.classList.remove('color');
                }
            });

            lastChoose = document.querySelector('.the-datepicker__day--selected span');
            lastChoose.classList.add('color');
            lastChooseDate = [setYear, setMonth, setDay];
        }
    });

    let clearButton = datePickerBox.querySelector('.date-clear-button');
    let checkButton = datePickerBox.querySelector('.date-check-button');
    clearButton.addEventListener('click', () => {
        inputBox.value = '';
        frameMask.style.display = 'none';
        let allCalendar = document.querySelectorAll('.date-container');
        allCalendar.forEach((item) => {
            item.style.display = 'none';
        });
        isOpen = !isOpen;

    });
    checkButton.addEventListener('click', () => {
        isNowButton = false;
        isOpen = !isOpen;
        datePickerBox.style.display = 'none';
        frameMask.style.display = 'none';
        if (neverChooseDay) {
            inputBox.value = `${setYear}-${setMonth}-${setDay} ${setTime}`;
        }
        lastChoose = document.querySelector('.the-datepicker__day--selected span');
        lastChoose.classList.add('color');
        lastChooseDate = [setYear, setMonth, setDay];
    });

}


frameMask.addEventListener('click', function () {
    frameMask.style.display = 'none';
    let allCalendar = document.querySelectorAll('.date-container');
    allCalendar.forEach((item) => {
        item.style.display = 'none';
    });
    isOpen = !isOpen;
});
let nowButton = document.querySelector('.now-button');
nowButton.addEventListener('click', function () {
    isNowButton = true;
    let nowDate = new Date();
    let inputBox = document.querySelector('.input-box');
    inputBox.value = `${nowDate.getFullYear()}-${nowDate.getMonth() + 1}-${nowDate.getDate()} ${nowDate.getHours()}:${nowDate.getMinutes()}`;
    lastChooseDate = [nowDate.getFullYear(), nowDate.getMonth() + 1, nowDate.getDate()];
});


let endInputBox = document.querySelector('#end-time-input');
endInputBox.addEventListener('click', () => {

});