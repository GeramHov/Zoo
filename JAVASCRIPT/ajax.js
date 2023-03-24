// AJAX REQUEST TO CALL FUNCTION ADD DIRT TO ENCLOSURE FROM PHP

function makeRequest(id) {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', '../treatDirt.php?id=' + id, true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText);
    }
  };
  xhr.send();
}

const intervalIds = [];

for (let id = 1; id < 8; id++) {
  const intervalId = setInterval(function() {
    makeRequest(id);
  }, 20000 * id);
  intervalIds.push(intervalId);
}
  