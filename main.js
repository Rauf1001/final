function hideNotification() {
    var notification = document.querySelector('.notification');
    
    if(notification){
        setCookie('notificationHidden', 'true', 1); 
        notification.style.display = 'none';
    }
}
function saveState() {
    var element = document.querySelector('h1');
    var rect = element.getBoundingClientRect();
    document.cookie = 'elementTop=' + rect.top;
    document.cookie = 'elementLeft=' + rect.left;
}

function restoreState() {
    var elementTop = getCookie('elementTop');
    var elementLeft = getCookie('elementLeft');

    if (elementTop && elementLeft) {
        document.querySelector('h1').style.position = 'absolute';
        document.querySelector('h1').style.top = elementTop + 'px';
        document.querySelector('h1').style.left = elementLeft + 'px';
    }
}
function clearState() {
    document.cookie = 'elementTop=;expires=Thu, 01 Jan 1970 00:00:00 GMT';
    document.cookie = 'elementLeft=;expires=Thu, 01 Jan 1970 00:00:00 GMT';
    document.cookie = 'number=;expires=Thu, 01 Jan 1970 00:00:00 GMT';
    document.cookie = 'notificationHidden=; expires=Thu, 01 Jan 1970 00:00:00 GMT';

}



function increaseNumber() {
    let number = parseInt(document.getElementById('number').innerText);
    number++;
    document.getElementById('number').innerText = number;
    document.cookie = 'number=' + number;
}

function changeColor() {
    const colors = ['red', 'blue', 'green', 'orange', 'purple', 'pink', 'black'];
    const randomColor = colors[Math.floor(Math.random() * colors.length)];
    document.getElementById('number').style.color = randomColor;
}
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    
}



function checkNotificationCookie() {
    if (getCookie('notificationHidden') === 'true') {
        hideNotification();
    }
}



