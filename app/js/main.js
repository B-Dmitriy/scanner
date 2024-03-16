function runAlert(d) {
    const btn = d.getElementById('about_btn');

    btn.addEventListener('click', () => {
        alert('KU');
    });
}

runAlert(document);