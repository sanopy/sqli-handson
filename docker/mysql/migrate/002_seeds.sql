use sqli;

INSERT INTO users (`username`, `password`, `email`, `first_name`, `last_name`, `created_at`) VALUES ('admin', 'passw0rd!',    'admin@example.com', 'Alan',   'Turing',    NOW());
INSERT INTO users (`username`, `password`, `email`, `first_name`, `last_name`, `created_at`) VALUES ('user',  'NBFv4E4jJd(a', 'user@example.com',  'Albert', 'Einstein',  NOW());
INSERT INTO users (`username`, `password`, `email`, `first_name`, `last_name`, `created_at`) VALUES ('root',  '$e_~,F&TwTr_', 'root@example.com',  'Daniel', 'Bernoulli', NOW());
INSERT INTO users (`username`, `password`, `email`, `first_name`, `last_name`, `created_at`) VALUES ('test1', 'AJVYa4L8qgL5', 'test1@example.com', 'Brook',  'Taylor',    NOW());
INSERT INTO users (`username`, `password`, `email`, `first_name`, `last_name`, `created_at`) VALUES ('test2', 'QWy(+b4i(b(z', 'test2@example.com', 'George', 'Boole',     NOW());

INSERT INTO secrets (`message`) VALUES ("Dorothy lived in the midst of the great Kansas prairies, with Uncle Henry, who was a farmer, and Aunt Em, who was the farmer's wife.");