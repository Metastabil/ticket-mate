UPDATE users
SET email         = :email,
    first_name    = :first_name,
    last_name     = :last_name,
    phone         = :phone,
    mobile        = :mobile,
    password      = :password,
    administrator = :administrator,
    deleted       = :deleted
WHERE id = :id;
