SELECT
       m.title,
       a.firstname,
       a.lastname
FROM movie AS m
JOIN author AS a ON a.id=m.author_id
WHERE m.id=1;