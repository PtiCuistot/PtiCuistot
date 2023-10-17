# -----------------------------------------------------------------------------
#       TABLE : PC_RECIPE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PC_RECIPE
 (
   REP_ID SMALLINT NOT NULL AUTO_INCREMENT,
   TA_ID INTEGER NOT NULL  ,
   TA_CONTENT VARCHAR(32) NOT NULL  ,
   US_ID BIGINT(10) NOT NULL  ,
   REP_TITLE VARCHAR(128) NOT NULL  ,
   REP_CONTENT TEXT NOT NULL  ,
   REP_IMAGE VARCHAR(1024) NOT NULL  ,
   REP_CREATED DATETIME NOT NULL  ,
   REP_UPDATED DATETIME NOT NULL  
   , PRIMARY KEY (REP_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PC_RECIPE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PC_RECIPE_PC_TAGS
     ON PC_RECIPE (TA_ID ASC,TA_CONTENT ASC);

CREATE  INDEX I_FK_PC_RECIPE_PC_USER
     ON PC_RECIPE (US_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : PC_INGREDIENTS_WEIGHT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PC_INGREDIENTS_WEIGHT
 (
   IW_ID BIGINT(5) NOT NULL  AUTO_INCREMENT,
   REP_ID SMALLINT NOT NULL  ,
   IW_WEIGHT INTEGER NOT NULL  ,
   IW_UNITY VARCHAR(3) NOT NULL  
   , PRIMARY KEY (IW_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PC_INGREDIENTS_WEIGHT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PC_INGREDIENTS_WEIGHT_PC_RECIPE
     ON PC_INGREDIENTS_WEIGHT (REP_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : PC_TAGS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PC_TAGS
 (
   TA_ID INTEGER NOT NULL AUTO_INCREMENT,
   TA_CONTENT VARCHAR(32) NOT NULL  ,
   TA_STATUT INTEGER NOT NULL  
   , PRIMARY KEY (TA_ID,TA_CONTENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PC_USER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PC_USER
 (
   US_ID BIGINT(10) NOT NULL AUTO_INCREMENT ,
   UT_ID SMALLINT NOT NULL  ,
   US_USERNAME VARCHAR(64) NOT NULL  ,
   US_EMAIL VARCHAR(128) NOT NULL  ,
   US_PASSWORD VARCHAR(1024) NOT NULL  ,
   US_FIRSTNAME VARCHAR(64) NULL  ,
   US_LASTNAME VARCHAR(64) NULL  ,
   US_STATUT SMALLINT NOT NULL  
   , PRIMARY KEY (US_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PC_USER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PC_USER_PC_USER_TYPE
     ON PC_USER (UT_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : PC_INGREDIENTS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PC_INGREDIENTS
 (
   ING_ID INTEGER NOT NULL  AUTO_INCREMENT,
   IW_ID BIGINT(5) NOT NULL  ,
   ING_NAME VARCHAR(128) NOT NULL  ,
   ING_DESCRIPTION VARCHAR(2048) NOT NULL  
   , PRIMARY KEY (ING_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PC_INGREDIENTS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PC_INGREDIENTS_PC_INGREDIENTS_WEIGHT
     ON PC_INGREDIENTS (IW_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : PC_CATEGORY
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PC_CATEGORY
 (
   CAT_ID INTEGER NOT NULL  AUTO_INCREMENT,
   REP_ID SMALLINT NOT NULL  ,
   CAT_TITLE VARCHAR(32) NOT NULL  ,
   CAT_DESCRIPTION VARCHAR(2048) NOT NULL  ,
   CAT_STATUT INTEGER NOT NULL  
   , PRIMARY KEY (CAT_ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PC_CATEGORY
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PC_CATEGORY_PC_RECIPE
     ON PC_CATEGORY (REP_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : PC_USER_TYPE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PC_USER_TYPE
 (
   UT_ID SMALLINT NOT NULL AUTO_INCREMENT,
   UT_NAME VARCHAR(32) NULL  
   , PRIMARY KEY (UT_ID) 
 ) 
 comment = "";


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE PC_RECIPE 
  ADD FOREIGN KEY FK_PC_RECIPE_PC_TAGS (TA_ID,TA_CONTENT)
      REFERENCES PC_TAGS (TA_ID,TA_CONTENT) ;


ALTER TABLE PC_RECIPE 
  ADD FOREIGN KEY FK_PC_RECIPE_PC_USER (US_ID)
      REFERENCES PC_USER (US_ID) ;


ALTER TABLE PC_INGREDIENTS_WEIGHT 
  ADD FOREIGN KEY FK_PC_INGREDIENTS_WEIGHT_PC_RECIPE (REP_ID)
      REFERENCES PC_RECIPE (REP_ID) ;


ALTER TABLE PC_USER 
  ADD FOREIGN KEY FK_PC_USER_PC_USER_TYPE (UT_ID)
      REFERENCES PC_USER_TYPE (UT_ID) ;


ALTER TABLE PC_INGREDIENTS 
  ADD FOREIGN KEY FK_PC_INGREDIENTS_PC_INGREDIENTS_WEIGHT (IW_ID)
      REFERENCES PC_INGREDIENTS_WEIGHT (IW_ID) ;


ALTER TABLE PC_CATEGORY 
  ADD FOREIGN KEY FK_PC_CATEGORY_PC_RECIPE (REP_ID)
      REFERENCES PC_RECIPE (REP_ID) ;
