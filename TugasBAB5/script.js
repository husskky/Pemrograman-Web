function addSubject() {
    const subjectsDiv = document.getElementById('subjects');
    const newSubject = document.createElement('div');
    newSubject.classList.add('subject');
    newSubject.innerHTML = `
        <input type="text" name="course" placeholder="Nama Mata Kuliah" required>
        <input type="number" name="score" placeholder="Nilai (0-100)" required>
        <input type="number" name="credits" placeholder="SKS" required>
    `;
    subjectsDiv.appendChild(newSubject);
}

function removeSubject() {
    const subjectsDiv = document.getElementById('subjects');
    const subjectList = subjectsDiv.getElementsByClassName('subject');
    if (subjectList.length > 1) {
        subjectsDiv.removeChild(subjectList[subjectList.length - 1]);
    } else {
        alert("Minimal harus ada satu mata kuliah.");
    }
}

function calculateIPS() {
    const scores = document.getElementsByName('score');
    const credits = document.getElementsByName('credits');
    let totalPoints = 0;
    let totalCredits = 0;
    let resultText = '';

    for (let i = 0; i < scores.length; i++) {
        const score = parseInt(scores[i].value);
        const credit = parseInt(credits[i].value);

        if (score < 0 || score > 100) {
            document.getElementById('result').innerHTML = "<p class='error'>Nilai tidak valid!</p>";
            return;
        }

        let grade;
        if (score >= 80) grade = 'A';
        else if (score >= 70) grade = 'B';
        else if (score >= 60) grade = 'C';
        else if (score >= 50) grade = 'D';
        else grade = 'E';

        const gradePoint = (grade === 'A') ? 4 : (grade === 'B') ? 3 : (grade === 'C') ? 2 : (grade === 'D') ? 1 : 0;
        totalPoints += gradePoint * credit;
        totalCredits += credit;

        resultText += `<p>Mata Kuliah: ${scores[i].previousElementSibling.value} - Nilai Mutu: ${grade}</p>`;
    }

    const ips = (totalPoints / totalCredits).toFixed(2);
    resultText += `<h3>IPS Anda: ${ips}</h3>`;

    document.getElementById('result').innerHTML = resultText;
}
