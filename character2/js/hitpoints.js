      
      /*
getHitsPoints (healer, add1, add2) - retreives the number of hit points that the healer will have based on their level (healer), stamina modifier (add1) and Lucky Sign (add2).  Luck Modifer applies if Bountiful Harvest luck sign is present.
*/
function hitPoints (healer, add1, add2) {
	var hd = healer.hd;
	var level = healer.level;
	var hitPoints = 0;
	var zeroLevelHitPoints = Math.floor((Math.random() * 4) + 1) + add1 + add2;
	var hitPointsEachLevel = Math.floor((Math.random() * 8) + 1) + add1 + add2;
	
	if (level === 1) {
		hitPoints = zeroLevelHitPoints + hitPointsEachLevel;
		if (hitPoints <= 5) {
			hitPoints = 6;
		}
	}	
	else if (level === 2) {
		hitPoints = zeroLevelHitPoints + hitPointsEachLevel + hitPointsEachLevel;
		if (hitPoints <= 8) {
			hitPoints = 9;
		}
	}
	else if (level === 3) {
		hitPoints = zeroLevelHitPoints + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel;
		if (hitPoints <= 11) {
			hitPoints = 12;
		}
	}
	else if (level === 4) {
		hitPoints = zeroLevelHitPoints + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel;
		if (hitPoints <= 14) {
			hitPoints = 15;
		}
	}
	else if (level === 5) {
		hitPoints = zeroLevelHitPoints + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel
		 + hitPointsEachLevel;
		if (hitPoints <= 16) {
			hitPoints = 17;
		}
	}
	else if (level === 6) {
		hitPoints = zeroLevelHitPoints + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel
		 + hitPointsEachLevel + hitPointsEachLevel;
		if (hitPoints <= 19) {
			hitPoints = 20;
		}
	}
	else if (level === 7) {
		hitPoints = zeroLevelHitPoints + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel
		 + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel;
		if (hitPoints <= 22) {
			hitPoints = 23;
		}
	}
	else if (level === 8) {
		hitPoints = zeroLevelHitPoints + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel
		 + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel;
		if (hitPoints <= 25) {
			hitPoints = 26;
		}
	}
	else if (level === 9) {
		hitPoints = zeroLevelHitPoints + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel
		 + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel;
		if (hitPoints <= 28) {
			hitPoints = 29;
		}
	}
	else if (level === 10) {
		hitPoints = zeroLevelHitPoints + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel
		 + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel + hitPointsEachLevel;
		if (hitPoints <= 31) {
			hitPoints = 32;
		}
	}
	return hitPoints;
}	  

	 