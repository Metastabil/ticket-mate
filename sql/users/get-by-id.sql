SELECT id,
       email,
       first_name,
       last_name,
       phone,
       mobile,
       password,
       administrator,
       deleted,
       created,
       updated
FROM users
WHERE deleted = :deleted
  AND id = :id;

