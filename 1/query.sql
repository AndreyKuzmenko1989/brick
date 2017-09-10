SELECT books.id,books.name,books.published FROM `books`
JOIN (SELECT id_book FROM `books_authors`
GROUP BY id_book
HAVING COUNT(id_book) = 3) AS b ON books.id = b.id_book