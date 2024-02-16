console.log(preTest());

function preTest() {
  let result = [];

  for (let i = 1; i <= 100; i++) {
    //cek habis dibagi 3&5
    if (i % 3 === 0 && i % 5 === 0) {
      result.push("TigaLima");
    }
    //cek habis dibagi 5
    else if (i % 5 === 0) {
      result.push("Lima");
    }
    //cek habis dibagi 3
    else if (i % 3 === 0) {
      result.push("Tiga");
    }
    // jika kondisi selain diatas
    else {
      result.push(i);
    }
  }

  return result;
}
