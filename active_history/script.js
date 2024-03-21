document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('radio-buttons').addEventListener('change', function (event) {
    var kuldottContent = document.getElementsByClassName('sent');
    var erkezoContent = document.getElementsByClassName('received');

    if (event.target.id === 'option1') {
      // Loop through elements with 'sent' class and change their style
      for (var i = 0; i < kuldottContent.length; i++) {
        kuldottContent[i].style.display = 'block';
      }
      // Loop through elements with 'received' class and change their style
      for (var j = 0; j < erkezoContent.length; j++) {
        erkezoContent[j].style.display = 'none';
      }
    } else if (event.target.id === 'option2') {
      // Loop through elements with 'sent' class and change their style
      for (var k = 0; k < kuldottContent.length; k++) {
        kuldottContent[k].style.display = 'none';
      }
      // Loop through elements with 'received' class and change their style
      for (var l = 0; l < erkezoContent.length; l++) {
        erkezoContent[l].style.display = 'block';
      }
    }
  });
});

function viewPdf(id) {
  const pdfUrl = '../arajanlatok/' + id + '.pdf';
  window.open(pdfUrl, '_blank', 'toolbar=0,location=0,menubar=0');
}

function downloadPdf(id) {
  const a = document.createElement('a');
  const pdfUrl = '../arajanlatok/' + id + '.pdf';
  a.href = pdfUrl;
  a.download = 'arajanlat.pdf';
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
}

function accept(id) {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../active_history/accept.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        location.reload();
      } else {
        console.error('Database update failed.' + xhr.responseText);
      }
    }
  };
  xhr.send('arajanlat_id=' + encodeURIComponent(id));
}

function decline(id) {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../active_history/decline.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        location.reload();
      } else {
        console.error('Database update failed.' + xhr.responseText);
      }
    }
  };
  xhr.send('arajanlat_id=' + encodeURIComponent(id));
}
