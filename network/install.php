<?
  require_once "lib/php/meekrodb.class.php";
  DB::$user = 'root';
  DB::$password = 'root';
  DB::$dbName = 'skill_pool';

  //Variables to change depending on company information, maybe make an installation form of it



  DB::query("CREATE TABLE IF NOT EXISTS user(
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    email varchar(128) NOT NULL,
    hash char(32) NOT NULL,
    first_name varchar(128) NOT NULL,
    last_name varchar(128) NOT NULL,
    registration_date timestamp,
    photo_link varchar(128),
    title varchar(128),
    city varchar(128),
    zip_code varchar(128),
    country varchar(128),
    verification_code char(32) NOT NULL,
    status tinyint(1) NOT NULL,
    telephone varchar(128),
    homepage varchar(128),
    about_me text,
    admin tinyint(1) NOT NULL
  );");

  DB::query("CREATE TABLE IF NOT EXISTS category(
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    name varchar(128) NOT NULL,
    CONSTRAINT uc_name_category UNIQUE (name)
  );");

  DB::query("CREATE TABLE IF NOT EXISTS skill(
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    name varchar(128) NOT NULL,
    category_id int(11) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES category(id),
    CONSTRAINT uc_name_skill UNIQUE (name)
  );");

  DB::query("CREATE TABLE IF NOT EXISTS user_skill(
    user_id int(11) NOT NULL,
    skill_id int(11) NOT NULL,
    date_added timestamp,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (skill_id) REFERENCES skill(id),
    PRIMARY KEY(user_id, skill_id)
  );");

  DB::query("CREATE TABLE IF NOT EXISTS skill_message(
    id int(11) PRIMARY KEY AUTO_INCREMENT ,
    skill_id int(11) NOT NULL,
    user_id int(11) NOT NULL,
    date_added timestamp,
    message text NOT NULL,
    title varchar(128) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (skill_id) REFERENCES skill(id)
  );");

  DB::query("CREATE TABLE IF NOT EXISTS site_setting(
    skey varchar(128) PRIMARY KEY,
    value varchar(128) NOT NULL
  );");

  DB::query("INSERT INTO site_setting(skey, value) VALUES('domain', '".$domain."');");

/*  DB::insert('site_setting', array(
  'skey' => 'domain',
  'value' => $domain) // $domain() is evaluated by MySQL
);*/

  

  /*  --- CATEGORIES --- */

  DB::insert('category', array(
    'name' => "Web programming and design"
  ));
  DB::insert('skill', array(
    'name' => "HTML",
    'category_id' => "1"
  ));
  DB::insert('skill', array(
    'name' => "PHP",
    'category_id' => "1"
  ));
  DB::insert('skill', array(
    'name' => "ASP.NET",
    'category_id' => "1"
  ));


  DB::insert('category', array(
    'name' => "Algorithms and data structures"
  ));
  DB::insert('skill', array(
    'name' => "Parallel computational procedures",
    'category_id' => "2"
  ));


  DB::insert('category', array(
    'name' => "Artificial intelligence"
  ));
  DB::insert('skill', array(
    'name' => "Robotics",
    'category_id' => "3"
  ));
  DB::insert('skill', array(
    'name' => "Machine learning",
    'category_id' => "3"
  ));
  DB::insert('skill', array(
    'name' => "Computer vision",
    'category_id' => "3"
  ));


  DB::insert('category', array(
    'name' => "Communication and security"
  ));
  DB::insert('skill', array(
    'name' => "Networking",
    'category_id' => "4"
  ));
  DB::insert('skill', array(
    'name' => "Cryptography",
    'category_id' => "4"
  ));


  DB::insert('category', array(
    'name' => "Computer architecture"
  ));
  DB::insert('skill', array(
    'name' => "Operating Systems",
    'category_id' => "5"
  ));


  DB::insert('category', array(
    'name' => "Computer graphics"
  ));
  DB::insert('skill', array(
    'name' => "Image processing",
    'category_id' => "6"
  ));


  DB::insert('category', array(
    'name' => "Concurrent, parallel, and distributed systems"
  ));
  DB::insert('skill', array(
    'name' => "Concurrency",
    'category_id' => "7"
  ));
  DB::insert('skill', array(
    'name' => "Parallel computing",
    'category_id' => "7"
  ));


  DB::insert('category', array(
    'name' => "Databases"
  ));
  DB::insert('skill', array(
    'name' => "Relational databases",
    'category_id' => "8"
  ));
  DB::insert('skill', array(
    'name' => "Distributed computing",
    'category_id' => "8"
  ));


  DB::insert('category', array(
    'name' => "Programming languages and compilers"
  ));
  DB::insert('skill', array(
    'name' => "Python",
    'category_id' => "9"
  ));


  DB::insert('category', array(
    'name' => "Scientific computing"
  ));
  DB::insert('skill', array(
    'name' => "Symbolic computation",
    'category_id' => "10"
  ));
  DB::insert('skill', array(
    'name' => "Bioinformatics",
    'category_id' => "10"
  ));


  DB::insert('category', array(
    'name' => "Software engineering"
  ));
  DB::insert('skill', array(
    'name' => "Human-computer interaction",
    'category_id' => "11"
  ));
  DB::insert('skill', array(
    'name' => "Formal methods",
    'category_id' => "11"
  ));


  DB::insert('category', array(
    'name' => "Theory of computation"
  ));
  DB::insert('skill', array(
    'name' => "Quantum computing",
    'category_id' => "12"
  ));
?>