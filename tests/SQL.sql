//Q: what is a transaction?



ACID: 
A - Atomicity:
- all or nothing

C - Consistency:
- all data must be valid according to the rules of the database

I - Isolation:
- transactions are isolated from each other, so that concurrent transactions do not interfere with each other

D - Durability:
- once a transaction is committed, it will remain so even in the event of a system failure

Q: . Find the Second Highest Salary

A: 
SELECT MAX(salary) as second_higest 
FROM employees
WHERE salary < (
    SELECT MAX(salary) 
    FROM employees
    WHERE salary IS NOT NULL
);

Q: Find Employees with More Than Average Salary
A:
SELIECT name, salary
FROM employees
WHERE salary > (
    SELECT AVG(salary)
    FROM employees
    WHERE salary IS NOT NULL
)

Q: Find duplicate emails 
A:
SELECT email, count(*) as count
FROM users
GGROUP BY email
HAVING count > 1;

Q: What is a deadlock?
A: A deadlock is a situation in which two or more transactions are waiting for each other
to release locks on resources, resulting in a standstill where none of the transactions can proceed.

Q: What is a foreign key?
A: A foreign key is a field (or collection of fields) in one table that uniquely identifies a row of another table.
It establishes a relationship between the two tables, ensuring referential integrity
by preventing actions that would destroy links between the tables.  

Q: What is a primary key?
A: A primary key is a field (or collection of fields) in a table that uniquely
identifies each row in that table. It must contain unique values and cannot contain NULL values.    

Q: What is a join?
A: A join is a SQL operation that combines rows from two or more tables based on a related column between them.
It allows you to retrieve data from multiple tables in a single query.  

Q: What is a view?
A: A view is a virtual table in SQL that is based on the result of a SELECT query.
It does not store data itself but provides a way to present data from one or more tables
in a specific format or structure. Views can simplify complex queries and enhance security by restricting access to
specific columns or rows of a table.    

Q: What is an index?
A: An index is a database object that improves the speed of data retrieval operations on a table
by providing a quick way to look up rows based on the values of one or more columns.
It is similar to an index in a book, allowing the database to find data without scanning the entire table.
Indexes can significantly enhance query performance, especially for large tables, but they also incur overhead
in terms of storage and maintenance during data modifications (inserts, updates, deletes).

Q. HOW INDEXING WORKS?
A: Indexing works by creating a data structure that allows the database to quickly locate rows in a table based on the values of indexed columns.
When a query is executed, the database engine can use the index to find the relevant rows without scanning the entire table.
The index is typically implemented as a B-tree or hash table, which organizes the data in a way that allows for efficient searching.

Q: B-TREE vs HASH INDEX vs GIN INDEX
A:
- B-tree index: A balanced tree structure that maintains sorted data and allows for efficient range queries
- Hash index: Uses a hash function to map keys to locations in the index, providing fast equality searches but not range queries
- GIN (Generalized Inverted Index): Used for indexing composite data types and full-text search, allowing for efficient searching of complex data structures    

Q: What is normalization?
A: Normalization is the process of organizing data in a database to reduce redundancy and improve data integrity.
It involves dividing a database into smaller, related tables and defining relationships between them to eliminate duplicate data
and ensure that each piece of data is stored in only one place. The goal of normalization is to create a more efficient and logical database structure
that minimizes data anomalies and makes it easier to maintain. There are several normalization rules, including:

1. First Normal Form (1NF): Ensures that each column contains atomic values and that each row is unique.

2. Second Normal Form (2NF): Ensures that all non-key attributes are fully functionally dependent on the primary key.

3. Third Normal Form (3NF): Ensures that all non-key attributes are not only dependent on the primary key but also independent of each other.

4. Boyce-Codd Normal Form (BCNF): A stronger version of 3NF that addresses certain anomalies that can still occur in 3NF.

5. Fourth Normal Form (4NF): Addresses multi-valued dependencies, ensuring that no table contains two or more independent multi-valued facts about an entity.

6. Fifth Normal Form (5NF): Ensures that a table is decomposed into smaller tables to eliminate redundancy while preserving all necessary relationships.

7. Domain-Key Normal Form (DKNF): Ensures that all constraints on the data are expressed in terms of domains and keys, providing a more comprehensive approach to normalization.

Normalization is typically applied in stages, with each stage building on the previous one to create a more refined database structure.
It is important to balance normalization with performance considerations, as excessive normalization can lead to complex queries and reduced performance.

In practice, many databases are designed to be  in a normalized state up to 3NF or BCNF, depending on the specific requirements and use cases.  

Q: What is a transaction log?
A: A transaction log is a record of all changes made to a database, including insertions, updates, and deletions.
It is used to ensure data integrity and recoverability in case of system failures or crashes.
The transaction log allows the database to roll back changes made by incomplete transactions and
to replay committed transactions to restore the database to a consistent state.

Q: What is a stored procedure?
A: A stored procedure is a precompiled collection of one or more SQL statements that can be
executed as a single unit. It is stored in the database and can be called by applications
or other database objects. Stored procedures can accept parameters, perform complex operations,
and return results, making them useful for encapsulating business logic and improving performance
by reducing the amount of data sent over the network.

Q: What is a trigger?
A: A trigger is a special type of stored procedure that automatically executes in response to certain events
on a table, such as insertions, updates, or deletions. Triggers can be used to enforce business rules, maintain data integrity,
or perform auditing tasks. They are defined at the table level and can be set to fire before or after the specified event occurs.

Q: What is a cursor?
A: A cursor is a database object that allows for row-by-row processing of query results.
It provides a way to iterate through a result set and perform operations on each row individually.
Cursors are often used in scenarios where set-based operations are not sufficient, such as when complex
calculations or conditional logic need to be applied to each row. However, cursors can be
less efficient than set-based operations and should be used judiciously.

Q: What is a subquery?
A: A subquery is a query nested inside another SQL query. It can be used to
retrieve data that will be used in the main query, allowing for more complex filtering and calculations.
Subqueries can be used in various clauses, such as the WHERE clause, FROM clause, or SELECT clause.

4. Find Top 3 Highest Paid Employees Per Department

A:
SELECT * FROM (
    SELECT *,
           ROW_NUMBER() OVER (PARTITION BY department ORDER BY salary DESC) as row_num
    FROM employees
) AS ranked_employees
WHERE row_num <= 3;

Q: What is a materialized view?
A: A materialized view is a database object that contains the results of a query and is stored on disk.
Unlike a regular view, which is virtual and recalculated each time it is queried, a materialized view stores the data physically,
allowing for faster access to precomputed results.
Materialized views can be refreshed periodically to reflect changes in the underlying data, making them useful for
improving query performance in scenarios where the underlying data does not change frequently.


LEFT JOIN vs RIGHT JOIN vs INNER JOIN vs FULL OUTER JOIN
A:
- LEFT JOIN: Returns all records from the left table and the matched records from the right table
- RIGHT JOIN: Returns all records from the right table and the matched records from the left table
- INNER JOIN: Returns only the records that have matching values in both tables
- FULL OUTER JOIN: Returns all records when there is a match in either left or right table records. If there is no match, NULL values are returned for the non-matching side.

Q: What is a self-join? 
A: A self-join is a type of join that allows a table to be joined with itself.
It is used to compare rows within the same table, often to find relationships or hierarchies within the data.

Q: What is a cross join?
A: A cross join, also known as a Cartesian join, returns the Cartesian product of two

Q: What is a Common Table Expression (CTE)?
A: A Common Table Expression (CTE) is a temporary result set that can be referenced within a SELECT, INSERT, UPDATE, or DELETE statement.
It is defined using the WITH clause and can be used to simplify complex queries by breaking them down into smaller, more manageable parts.
CTEs can also be recursive, allowing for operations on hierarchical or tree-structured data.
tables, meaning it returns all possible combinations of rows from both tables.  

Q: what if left join does not find a match?
A: If a LEFT JOIN does not find a match in the right table, it will still return all records from the left table,
but the columns from the right table will contain NULL values for those records.

Q: What is a window function?
A: A window function is a type of SQL function that performs calculations across a set of rows
related to the current row within a result set. It allows for operations such as ranking, aggregation,
and running totals without collapsing the result set into a single row.

example of a window function:
SELECT name, salary,
       RANK() OVER (ORDER BY salary DESC) as salary_rank
FROM employees;



Q: What is a partition in SQL?
A: A partition in SQL refers to dividing a table into smaller, more manageable pieces based on a specified column or set of columns.
Partitioning can improve query performance and manageability by allowing the database to access only the relevant partitions
instead of scanning the entire table. It is often used in large tables where data can be logically divided, such as by date or region.

Q: What is a schema in SQL?
A: A schema in SQL is a logical container that holds database objects such as tables, views, indexes, and stored procedures.
It provides a way to organize and group related objects within a database, allowing for better management and security.
Schemas can also help avoid naming conflicts by allowing objects with the same name to exist in different schemas.  


