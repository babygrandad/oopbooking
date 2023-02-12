function calculate_stay(dayIn, dayOut) {
    var date1 = new Date(dayIn);
    var date2 = new Date(dayOut);
    var diffTime = date2.getTime() - date1.getTime();
    var diffDays = diffTime / (1000 * 3600 * 24);

    console.log(diffDays);
    return diffDays;
}



