function toggleItems(type) {
    var receivedItems = document.querySelectorAll('.received');
    var sentItems = document.querySelectorAll('.sent');

    if (type === 'sent') {
      sentItems.forEach(item => {
        item.style.display = 'block';
      });
      receivedItems.forEach(item => {
        item.style.display = 'none';
      });
    } else {
      receivedItems.forEach(item => {
        item.style.display = 'block';
      });
      sentItems.forEach(item => {
        item.style.display = 'none';
      });
    }
  }