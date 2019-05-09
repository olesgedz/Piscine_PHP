SELECT first_name, last_name, DATE(birthdate) from user_card
WHERE YEAR(birthdate) = '1976' ORDER by last_name;