<style>
    .text-with-line, .text-with-line2, .text-with-line3{
        position: relative;
        display: inline-block;
    }
    .text-with-line::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50px; /* Adjust this value for distance from text */
        height: 4px;
        width: 20px; /* Adjust this value for length of the line */
        background-color: red;
        transform: translateY(-50%);
    }

    .text-with-line2::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 60px; /* Adjust this value for distance from text */
        height: 4px;
        width: 20px; /* Adjust this value for length of the line */
        background-color: green;
        transform: translateY(-50%);
    }

    .text-with-line3::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 60px; /* Adjust this value for distance from text */
        height: 4px;
        width: 20px; /* Adjust this value for length of the line */
        background-color: blue;
        transform: translateY(-50%);
    }
</style>