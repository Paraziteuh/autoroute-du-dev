#Créer la classe ABR
class ABR:
    def __init__(self, racine=None, gauche=None, droite=None):
        self.racine = racine
        self.gauche = gauche
        self.droite = droite
    
# Getters et setters
    def get_racine(self):
        return self.racine
    
    def set_racine(self, racine):
        self.racine = racine
    
    def get_gauche(self):
        return self.gauche
    
    def set_gauche(self, gauche):
        self.gauche = gauche
    
    def get_droite(self):
        return self.droite
    
    def set_droite(self, droite):
        self.droite = droite
    
    def estVide(self):
        return self.racine is None
    
    def prefixe(self):
        if self.estVide():
            return []
        else:
            res = [self.racine]
            if self.gauche is not None:
                res += self.gauche.prefixe()
            if self.droite is not None:
                res += self.droite.prefixe()
            return res
    
    def infixe(self):
        if self.estVide():
            return []
        else:
            res = []
            if self.gauche is not None:
                res += self.gauche.infixe()
            res += [self.racine]
            if self.droite is not None:
                res += self.droite.infixe()
            return res
    
    def postfixe(self):
        if self.estVide():
            return []
        else:
            res = []
            if self.gauche is not None:
                res += self.gauche.postfixe()
            if self.droite is not None:
                res += self.droite.postfixe()
            res += [self.racine]
            return res
    
    def taille(self):
        if self.estVide():
            return 0
        else:
            return 1 + (self.gauche.taille() if self.gauche is not None else 0) + (self.droite.taille()
             if self.droite is not None else 0)
    
    def hauteur(self):
        if self.estVide():
            return -1
        else:
            return 1 + max((self.gauche.hauteur() if self.gauche is not None else -1), (self.droite.hauteur() if self.droite is not None else -1))

# créer l' arbre binaire de recherche
arbre = ABR(10, ABR(5), ABR(15, ABR(12), ABR(20)))

# affiche la racine de l'arbre
print("La racine de l'arbre est : ", arbre.get_racine())

# Affiche les arbres gauche et droit de la racine
print("L'arbre gauche de la racine est : ", arbre.get_gauche().get_racine())
print("L'arbre droit de la racine est : ", arbre.get_droite().get_racine())

# Affiche les parcours préfixe, infixe et postfixe
print("Le parcours préfixe est : ", arbre.prefixe())
print("Le parcours infixe est : ", arbre.infixe())
print("Le parcours postfixe est : ", arbre.postfixe())

# Affiche la taille et la hauteur de l'arbre
print("La taille de l'arbre est : ", arbre.taille())
print("La hauteur de l'arbre est : ", arbre.hauteur())