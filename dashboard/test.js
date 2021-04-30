function reqListener () {
    console.log(this.responseText);
  }

  var oReq = new XMLHttpRequest(); // New request object
  oReq.onload = function() {
      // This is where you handle what to do with the response.
      // The actual data is found on this.responseText
      var a = this.responseText; // Will alert: 42
      alert(a);
      console.log(data.price[0]);
      alert('test');
  };
  oReq.open("get", "test.php", false);
  //                               ^ Don't block the rest of the execution.
  //                                 Don't wait until the request finishes to
  //                                 continue.
  oReq.send();