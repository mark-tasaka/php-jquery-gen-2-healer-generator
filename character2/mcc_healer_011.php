<!DOCTYPE html>
<html>
<head>
<title>Gen 2 MCC Healer Character Generator</title>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
	<meta charset="UTF-8">
	<meta name="description" content="Mutant Crawl Classics Sentinel Character Generator. Goodman Games.">
	<meta name="keywords" content="Mutant Crawl Classics, Jim Wampler, Goodman Games,HTML5,CSS,JavaScript">
	<meta name="author" content="Mark Tasaka 2018">
		

	<link rel="stylesheet" type="text/css" href="css/mcc_healer2.css">
	<link rel="stylesheet" type="text/css" href="css/mcc_healer_post.css">
    
    
    <script type="text/javascript" src="./js/dieRoll.js"></script>
    <script type="text/javascript" src="./js/abilityScoreMod.js"></script>
    <script type="text/javascript" src="./js/profession.js"></script>
    <script type="text/javascript" src="./js/birthAugur.js"></script>
    <script type="text/javascript" src="./js/adjustments.js"></script>
    <script type="text/javascript" src="./js/hitpoints.js"></script>
    
    
    
</head>
<body>
    
        <?php
    
    include 'php/artifacts.php';
    include 'php/adjustments.php';
    
    
        if(isset($_POST["theCharacterName"]))
        {
            $healerName = $_POST["theCharacterName"];
    
        }
    
        if(isset($_POST["thePlayerName"]))
        {
            $gamerName = $_POST["thePlayerName"];
        
        }    
    
        if(isset($_POST["theArchaicAlignment"]))
        {
            $archaicAlignment = $_POST["theArchaicAlignment"];
        }
    
        if(isset($_POST["theArtifact1"]))
        {
            $artifact1 = $_POST["theArtifact1"];
        }
    
    
        /*Bonus to AC value*/
        $acBonusFromArtifact = 0;
            
        /*Bonus to Strength value*/
        $strengthBonusFromArtifact = 0;
    
    

        $artifactName1 = getArtifact1($artifact1)[0];
        $artifactCheck1 = getArtifact1($artifact1)[1];
        $artifactEffect1 = getArtifact1($artifact1)[2];
    
        /*Determines whether Artifact grants AC bonus*/
        $acBonusFromArtifact1 = artifactAcBonus ($artifactName1, $acBonusFromArtifact);
    
        /*Determines whether Artifact grants strength bonus*/
        $strengthBonusFromArtifact1 = artifactStrengthBonus ($artifactName1, $strengthBonusFromArtifact);
    
    
        if(isset($_POST["theArtifact2"]))
        {
            $artifact2 = $_POST["theArtifact2"];
        }

        $artifactName2 = getArtifact1($artifact2)[0];
        $artifactCheck2 = getArtifact1($artifact2)[1];
        $artifactEffect2 = getArtifact1($artifact2)[2];
    
        /*Determines whether Artifact grants AC bonus*/
        $acBonusFromArtifact2 = artifactAcBonus ($artifactName2, $acBonusFromArtifact);
    
        /*Determines whether Artifact grants strength bonus*/
        $strengthBonusFromArtifact2 = artifactStrengthBonus ($artifactName2, $strengthBonusFromArtifact);
    
    
        if(isset($_POST["theArtifact3"]))
        {
            $artifact3 = $_POST["theArtifact3"];
        }

        $artifactName3 = getArtifact1($artifact3)[0];
        $artifactCheck3 = getArtifact1($artifact3)[1];
        $artifactEffect3 = getArtifact1($artifact3)[2];
    
        /*Determines whether Artifact grants AC bonus*/
        $acBonusFromArtifact3 = artifactAcBonus ($artifactName3, $acBonusFromArtifact);
    
        /*Determines whether Artifact grants strength bonus*/
        $strengthBonusFromArtifact3 = artifactStrengthBonus ($artifactName3, $strengthBonusFromArtifact);
    
    
        if(isset($_POST["theArtifact4"]))
        {
            $artifact4 = $_POST["theArtifact4"];
        }

        $artifactName4 = getArtifact1($artifact4)[0];
        $artifactCheck4 = getArtifact1($artifact4)[1];
        $artifactEffect4 = getArtifact1($artifact4)[2];
        
        /*Determines whether Artifact grants AC bonus*/
        $acBonusFromArtifact4 = artifactAcBonus ($artifactName4, $acBonusFromArtifact);
    
        /*Determines whether Artifact grants strength bonus*/
        $strengthBonusFromArtifact4 = artifactStrengthBonus ($artifactName4, $strengthBonusFromArtifact);
    
    
        $totalArtifactAC = $acBonusFromArtifact1 +$acBonusFromArtifact2 + $acBonusFromArtifact3 + $acBonusFromArtifact4;
    
        $totalArtifactStrength = $strengthBonusFromArtifact1 +$strengthBonusFromArtifact2 + $strengthBonusFromArtifact3 + $strengthBonusFromArtifact4;
    
            
        if(isset($_POST["theWeaponName1"]))
        {
            $weaponName1 = $_POST["theWeaponName1"];
        }
                
        if(isset($_POST["theWeaponDamage1"]))
        {
            $weaponDamage1 = $_POST["theWeaponDamage1"];
        }
            
        if(isset($_POST["theWeaponName2"]))
        {
            $weaponName2 = $_POST["theWeaponName2"];
        }
                
        if(isset($_POST["theWeaponDamage2"]))
        {
            $weaponDamage2 = $_POST["theWeaponDamage2"];
        }
                
        if(isset($_POST["theWeaponName3"]))
        {
            $weaponName3 = $_POST["theWeaponName3"];
        }
                
        if(isset($_POST["theWeaponDamage3"]))
        {
            $weaponDamage3 = $_POST["theWeaponDamage3"];
        }
    
                   
        if(isset($_POST["theWeaponName4"]))
        {
            $weaponName4 = $_POST["theWeaponName4"];
        }
                
        if(isset($_POST["theWeaponDamage4"]))
        {
            $weaponDamage4 = $_POST["theWeaponDamage4"];
        }
    
            
        if(isset($_POST["theArmour"]))
        {
            $armourDesrcipt = $_POST["theArmour"];
        }

            
        if(isset($_POST["theArmourClassBonus"]))
        {
            $bonusToArmourClass = $_POST["theArmourClassBonus"];
        }
    
        $armourBonusToArmourClass = armourBonusToAC ($bonusToArmourClass);
              
        if(isset($_POST["theCheckPenArmour"]))
        {
            $armourPenCheck = $_POST["theCheckPenArmour"];
        }
                    
        if(isset($_POST["theSpeedPenArmour"]))
        {
            $armourPenToSpeed = $_POST["theSpeedPenArmour"];
        }
    
        $speedReduction = speedAdjustment ($armourPenToSpeed);
                               
                        
        if(isset($_POST["theFumbleArmour"]))
        {
            $armourFumble = $_POST["theFumbleArmour"];
        }
                            
        if(isset($_POST["theEquipmentTreasureBox"]))
        {
            $equipmentTreasure = $_POST["theEquipmentTreasureBox"];
        }
    
    
    ?>
	
<!-- JQuery -->
  <img id="character_sheet"/>
   <section>
    	<span id="name"></span>
           
		<span id="profession"></span>
		<span id="strength"></span> <span id="strengthMod"></span>
		<span id="agility"></span>  <span id="agilityMod"></span>
           
		<span id="stamina"></span>  <span id="staminaMod"></span>
		<span id="personality"></span> <span id="personalityMod"></span>
		<span id="intelligence"></span> <span id="intelligenceMod"></span>
		<span id="luck"></span> <span id="luckMod"></span>
		  
    
		   
		<p id="birthAugur"><span id="luckySign"></span>: <span id="luckyRoll"></span> (<span id="LuckySignBonus"></span>)</p>
           
        <span id="baseAC"></span>
        <span id="level"></span>
        <span id="title"></span>
       
      
           
		<span id="hitPoints"></span> 
        
        
        <span id="ref"></span>
        <span id="fort"></span>
        <span id="will"></span>
		
       
        <span id="init"></span>
		<span id="melee"></span>
        <span id="range"></span>
		<span id="meleeDamage"></span>
        <span id="rangeDamage"></span>
           

        <span id="fumbleDie"></span>
           <span id="speed"></span>
           
		<span id="critDie"></span>
		<span id="critTable"></span>
           

        <span id="actionDice">1d2</span>
           
           <span id="artifactCheck"></span>
           <span id="maxTech"></span>
       
        <span id="naturalHealing"></span>
		   <span id="dieRollMethod"></span>
       
       <div id="languageGroup">
       <span id="languages"></span>
    <span id="additionalLanguages"></span>
           </div>
       
       
       <span id="modifiedFumble"></span>
       
       <span id="modifiedSpeed"></span>
       
       <span id="modifiedArmourClass"></span>

       <span id="characterName">
           <?php
                echo $healerName;
           ?>
        </span>
       
              
       <span id="playerName">
           <?php
                echo $gamerName;
           ?>
        </span>
	                 
       <span id="arcAlignment">
           <?php
                echo $archaicAlignment;
           ?>
        </span>
	   
       	                 
       <span id="artifactName1">
           <?php
                echo $artifactName1;
           ?>
        </span>
              
       <span id="artifactCheck1">
           <?php
                echo $artifactCheck1;
           ?>
        </span>
              
       <span id="artifactEffect1">
           <?php
                echo $artifactEffect1;
           ?>
        </span>
      
              	                 
       <span id="artifactName2">
           <?php
                echo $artifactName2;
           ?>
        </span>
              
       <span id="artifactCheck2">
           <?php
                echo $artifactCheck2;
           ?>
        </span>
              
       <span id="artifactEffect2">
           <?php
                echo $artifactEffect2;
           ?>
        </span>
      
                     	                 
       <span id="artifactName3">
           <?php
                echo $artifactName3;
           ?>
        </span>
              
       <span id="artifactCheck3">
           <?php
                echo $artifactCheck3;
           ?>
        </span>
              
       <span id="artifactEffect3">
           <?php
                echo $artifactEffect3;
           ?>
        </span>
                            	                 
       <span id="artifactName4">
           <?php
                echo $artifactName4;
           ?>
        </span>
              
       <span id="artifactCheck4">
           <?php
                echo $artifactCheck4;
           ?>
        </span>
              
       <span id="artifactEffect4">
           <?php
                echo $artifactEffect4;
           ?>
        </span>
       
       
              
       <span id="weaponDescription1">
           <?php
                echo $weaponName1;
           ?>
        </span>
                     
       <span id="weaponDamage1">
           <?php
                echo $weaponDamage1;
           ?>
        </span>
       
              
       <span id="weaponDescription2">
           <?php
                echo $weaponName2;
           ?>
        </span>
                     
       <span id="weaponDamage2">
           <?php
                echo $weaponDamage2;
           ?>
        </span>
       
                     
       <span id="weaponDescription3">
           <?php
                echo $weaponName3;
           ?>
        </span>
                     
       <span id="weaponDamage3">
           <?php
                echo $weaponDamage3;
           ?>
        </span>
                       
       <span id="weaponDescription4">
           <?php
                echo $weaponName4;
           ?>
        </span>
                     
       <span id="weaponDamage4">
           <?php
                echo $weaponDamage4;
           ?>
        </span>
                             
       <span id="armourDescription">
           <?php
                echo $armourDesrcipt;
           ?>
        </span>
                     
       <span id="armourBonus">
           <?php
                echo $bonusToArmourClass;
           ?>
        </span>
      
    
       <span id="armourPenalityCheck">
           <?php
                echo $armourPenCheck;
           ?>
        </span>
       
           
       <span id="armourSpeedPen">
           <?php
                echo $armourPenToSpeed;
           ?>
        </span>
                  
       <span id="fumbleArmourValue">
           <?php
                echo $armourFumble;
           ?>
        </span>
       
              <span id="equipmentGear">
           <?php
                echo $equipmentTreasure;
           ?>
        </span>
                     

       
       
	   	   
	</section>
	

		
  <script>
      

	  
	/*
	 Character() - Healer Character Constructor
	*/
	function Character() {
	
    let strength = <?php echo $totalArtifactStrength ?> + rollDice(6, 3, 0, 0);
    let agility = rollDice(6, 3, 0, 0);
    let stamina = rollDice(6, 3, 0, 0);
    let	personality = rollDice(6, 3, 0, 0);
    let	intelligence = rollDice(6, 3, 0, 0);
    let	luck = rollDice(6, 3, 0, 0);
	let	profession = getProfession();
	let birthAugur = getLuckySign();
	let strengthModifier = getStrengthModifier(strength);
	let staminaModifier = getStaminaModifier(stamina);
	let agilityModifier = getAgilityModifier(agility);
	let personalityModifier = getPersonalityModifier(personality);
	let intelligenceModifier = getIntelligenceModifier(intelligence);
	let luckModifier = getLuckModifier(luck);
    let maxTechLevel = getMaxTechLevel(intelligence);
    let bonusLanguages = fnAddLanguages(intelligenceModifier, birthAugur, luckModifier);
	let baseAC = getBaseArmourClass(agilityModifier)  + adjustAC(birthAugur, getLuckModifier(luck));
    var healer = getHealer();
		
		let healerCharacter = {
			"name": "",
			"strength": strength,
			"agility": agility,
			"stamina": stamina,
			"personality": personality,
			"intelligence": intelligence,
			"luck": luck,
			"strengthModifier": strengthModifier,
			"agilityModifier": agilityModifier,
			"staminaModifier": staminaModifier,
			"personalityModifier": personalityModifier,
			"intelligenceModifier": intelligenceModifier,
			"luckModifier":  luckModifier,
			"profession":  profession.role,
			"luckySign": birthAugur.luckySign,
			"luckyRoll": birthAugur.luckyRoll,
			"luckySignBonus": getLuckModifier(luck),
            "level": healer.level,
            "title": healer.title,
			"hitPoints": hitPoints (healer, staminaModifier, hitPointAdjustPerLevel(luckySign, luckModifier)),
			"ref": healer.ref + agilityModifier + adjustRef(birthAugur, luckModifier),
			"fort": healer.fort + staminaModifier + adjustFort(birthAugur,luckModifier),
			"will": healer.will + personalityModifier + adjustWill(birthAugur, luckModifier),
			"init": agilityModifier + adjustInit(birthAugur, luckModifier),
			"melee": healer.attackBonus + strengthModifier + meleeAdjust(birthAugur, getLuckModifier(luck)),
            "meleeDamageBonus": strengthModifier + adjustMeleeDamage(birthAugur, getLuckModifier(luck)),
			"range": healer.attackBonus + agilityModifier + rangeAdjust(birthAugur, getLuckModifier(luck)),
            "rangeDamageBonus": 0 + adjustRangeDamage(birthAugur, getLuckModifier(luck)),
			"speed": 30 + addLuckToSpeed(birthAugur, getLuckModifier(luck)) + "'",
			"modifiedSpeed": 30 - <?php echo $speedReduction ?> + addLuckToSpeed(birthAugur, getLuckModifier(luck)) + "'",
            "fumbleDie": "d4" + addSign(adjustFumble (birthAugur, getLuckModifier(luck))),
            "modifiedFumbleDie": "<?php echo $armourFumble ?>" + addSign(adjustFumble (birthAugur, getLuckModifier(luck))),
			"critDie": healer.critDie + "" + addSign(adjustCrit(birthAugur, getLuckModifier(luck))),
			"critTable": healer.critTable,
            "actionDice": healer.actionDice,
            "artifactCheck": "1d20" + "" + addSign(intelligenceModifier + healer.artifactCheckBonus),
            "techLevel": maxTechLevel,
            "naturalHealingDay": healer.naturalHealing,
            "languages": "Nu-Speak", 
            "addLanguages": bonusLanguages,
            "acNoArmoured": baseArmourClass,
            "modifiedArmourClass": <?php echo $armourBonusToArmourClass ?> + <?php echo $totalArtifactAC ?> + baseArmourClass, 
			"dieRollMethod": "Ability Scores: 3d6 (Old School)"
			
		
			

		};
	    if(healerCharacter.hitPoints <= 0 ){
			healerCharacter.hitPoints = 1;
		}
		return healerCharacter;
	  
	  }
	  

     /*getHealer() return the statistics for the healer per level*/  
    function getHealer() {
	var healer = [
        
		{"level": 1,
		 "title": "Healer, Intern",
		 "actionDice": "1d20",
		 "attackBonus": 0,
		 "critDie": "1d8",
		 "critTable": "III",
		 "hd": 1,
		 "ref": 0,
		 "fort": 1,
		 "will": 1,
		 "artifactCheckBonus": 2,
         "naturalHealing": "1d3 (x2)"
        },
        
		{"level": 2,
		 "title": "Healer, Medic",
		 "actionDice": "1d20",
		 "attackBonus": 1,
		 "critDie": "1d8",
		 "critTable": "III",
		 "hd": 2,
		 "ref": 0,
		 "fort": 1,
		 "will": 1,
		 "artifactCheckBonus": 3,
         "naturalHealing": "1d4 (x4)"
        },
        
		{"level": 3,
		 "title": "Healer, Curate",
		 "actionDice": "1d20",
		 "attackBonus": 2,
		 "critDie": "1d10",
		 "critTable": "III",
		 "hd": 3,
		 "ref": 1,
		 "fort": 1,
		 "will": 2,
		 "artifactCheckBonus": 4,
         "naturalHealing": "1d5 (x6)"
        },
        
		{"level": 4,
		 "title": "Healer, Doctor",
		 "actionDice": "1d20",
		 "attackBonus": 2,
		 "critDie": "1d10",
		 "critTable": "III",
		 "hd": 4,
		 "ref": 1,
		 "fort": 2,
		 "will": 2,
		 "artifactCheckBonus": 5,
         "naturalHealing": "1d6 (x8)"
        },
                
		{"level": 5,
		 "title": "Healer, Healer",
		 "actionDice": "1d20",
		 "attackBonus": 3,
		 "critDie": "1d12",
		 "critTable": "III",
		 "hd": 5,
		 "ref": 1,
		 "fort": 2,
		 "will": 3,
		 "artifactCheckBonus": 5,
         "naturalHealing": "1d7 (x10)"
        },
               
		{"level": 6,
		 "title": "High Healer",
		 "actionDice": "1d20+1d14",
		 "attackBonus": 4,
		 "critDie": "1d12",
		 "critTable": "III",
		 "hd": 6,
		 "ref": 2,
		 "fort": 2,
		 "will": 4,
		 "artifactCheckBonus": 6,
         "naturalHealing": "1d8 (x12)"
        },
        		
        {"level": 7,
		 "title": "High Healer",
		 "actionDice": "1d20+1d16",
		 "attackBonus": 5,
		 "critDie": "1d14",
		 "critTable": "III",
		 "hd": 7,
		 "ref": 2,
		 "fort": 3,
		 "will": 4,
		 "artifactCheckBonus": 7,
         "naturalHealing": "1d10 (x14)"
        },
                		
        {"level": 8,
		 "title": "High Healer",
		 "actionDice": "1d20+1d20",
		 "attackBonus": 5,
		 "critDie": "2d14",
		 "critTable": "III",
		 "hd": 8,
		 "ref": 2,
		 "fort": 3,
		 "will": 5,
		 "artifactCheckBonus": 8,
         "naturalHealing": "1d12 (x16)"
        },
                        		
        {"level": 9,
		 "title": "High Healer",
		 "actionDice": "1d20+1d20",
		 "attackBonus": 6,
		 "critDie": "2d16",
		 "critTable": "III",
		 "hd": 9,
		 "ref": 3,
		 "fort": 3,
		 "will": 5,
		 "artifactCheckBonus": 9,
         "naturalHealing": "1d14 (x18)"
        },
                
        {"level": 10,
		 "title": "High Healer",
		 "actionDice": "1d20+1d20",
		 "attackBonus": 7,
		 "critDie": "2d16",
		 "critTable": "III",
		 "hd": 10,
		 "ref": 3,
		 "fort": 4,
		 "will": 6,
		 "artifactCheckBonus": 10,
         "naturalHealing": "1d16 (x20)"
        }
		
	];
	
	
	return healer[0]; 
}
  
       let imgData = "images/healer_character_sheet.png";
      
        $("#character_sheet").attr("src", imgData);
      

	  let data = Character();
		 
      
          $("#name").html(data.name);
          
          $("#profession").html(data.profession);
          
      $("#strength").html(data.strength);
      $("#strengthMod").html(addModifierSign(data.strengthModifier));
      
      $("#agility").html(data.agility);
      $("#agilityMod").html(addModifierSign(data.agilityModifier));
      
      $("#stamina").html(data.stamina);
      $("#staminaMod").html(addModifierSign(data.staminaModifier));
      
      $("#personality").html(data.personality);
      $("#personalityMod").html(addModifierSign(data.personalityModifier));
      
      $("#intelligence").html(data.intelligence);
      $("#intelligenceMod").html(addModifierSign(data.intelligenceModifier));
      
      $("#luck").html(data.luck);
      $("#luckMod").html(addModifierSign(data.luckModifier));
      
      $("#luckySign").html(data.luckySign);
      $("#luckyRoll").html(data.luckyRoll);
      $("#LuckySignBonus").html(addModifierSign(data.luckySignBonus));
      
      $("#baseAC").html(data.acNoArmoured);
      $("#level").html(data.level);
      $("#title").html(data.title);
      $("#hitPoints").html(data.hitPoints);
      
      $("#ref").html(addModifierSign(data.ref));
      $("#fort").html(addModifierSign(data.fort));
      $("#will").html(addModifierSign(data.will));
      
      $("#init").html(addModifierSign(data.init));
      $("#melee").html(addModifierSign(data.melee));
      $("#range").html(addModifierSign(data.range));
      
      $("#meleeDamage").html(addModifierSign(data.meleeDamageBonus));
      $("#rangeDamage").html(addModifierSign(data.rangeDamageBonus));
      
      $("#fumbleDie").html(data.fumbleDie);
      $("#speed").html(data.speed);
      $("#critDie").html(data.critDie);
      $("#critTable").html(data.critTable);
      $("#actionDice").html(data.actionDice);
      
      $("#artifactCheck").html(data.artifactCheck);
      $("#maxTech").html(data.techLevel);
      $("#naturalHealing").html(data.naturalHealingDay);
      $("#dieRollMethod").html(data.dieRollMethod);
      $("#languages").html(data.languages);
      $("#additionalLanguages").html(data.addLanguages);
      
      
      $("#modifiedFumble").html(data.modifiedFumbleDie);
      $("#modifiedSpeed").html(data.modifiedSpeed);
    
      
      $("#modifiedArmourClass").html(data.modifiedArmourClass);

	 
  </script>
		
	
    
</body>
</html>