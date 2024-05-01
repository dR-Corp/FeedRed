Sub Q1()
    'Sélection de la cellule B3
    Cells(3, 2).Select
    Cells(3, "B").Select
End Sub
Sub Q2()
    'Sélection de la place dont la cellule supérieure gauche est A1 et la cellule inférieure droite, Z30
    Range("A1:Z30").Select
    Range(Cells(1, 1), Cells(30, 26)).Select
End Sub
Sub Q3()
    'Sélection de la deuxième colonne du document
    Columns(2).Select
    Columns("B").Select
    Columns("B:B").Select
End Sub
Sub Q4()
    'Sélection de toutes les colonnes de la colonne B à la colonne D
    Columns("B:D").Select
End Sub
Sub Q5()
    'Sélection de l'entièreté de la ligne 5
    Rows(5).Select
End Sub
Sub Q6()
    'Sélection de toutes les cellules
    Cells.Select
End Sub
Sub Q7()
    'Activer du workSheet 2 dans le Workbook Actif
    ActiveWorkbook.Worksheets(2).Activate
End Sub
Sub Q8()
    'Activer du workSheet "S1" dans le Workbook Actif
    ActiveWorkbook.Worksheets("S1").Activate
End Sub
Sub Q9()
    'Sélection de la première colonne de la table dont le coin supérieur gauche cellule A1, dans le worksheet "S1" (seulement les cellules dans la table, pas toutes la colonne)
    Worksheets("S1").UsedRange.Columns(1).Select
End Sub
Sub Q10()
    'Compte du nombre de ligne dans une table dont le coin supérieur gauche est la cellule A1 (Affichage du résultat via MsgBox)
    Dim nbRows As Integer, msg As String
    nbRows = Worksheets("S1").UsedRange.Rows.Count
    msg = "Le nombre de ligne est " & nbRows
    MsgBox msg
End Sub
Sub Q11()
    'Compte du nombre de colonnes dans une table dont le coin supérieur gauche est la cellule A1 (Affichage du résultat via MsgBox)
    Dim nbColumns As Integer, msg As String
    nbColumns = Worksheets("S1").UsedRange.Columns.Count
    msg = "Le nombre de colonne est " & nbColumns
    MsgBox msg
End Sub
Sub Q12()
    'Obtention du nombre de lignes utilisé dans le Sheet Actif (Affichage du résultat via MsgBox)
    Dim nbRows As Integer, msg As String
    nbRows = ActiveSheet.UsedRange.Rows.Count
    msg = "Le nombre de ligne est " & nbRows
    MsgBox msg
End Sub
Sub Q13()
    'Obtention du nombre de colonnes utilisé dans le Sheet Actif (Affichage du résultat via MsgBox)
    Dim nbColumns As Integer, msg As String
    nbColumns = ActiveSheet.UsedRange.Columns.Count
    msg = "Le nombre de ligne est " & nbColumns
    MsgBox msg
End Sub
Sub Q14()
    'Effacer les valeurs de la plage A2:D11 dans le worksheet S2
    Worksheets("S2").Range("A2:D11").ClearContents
End Sub
Sub Q15()
    'Effacer seulement les formats de la plage A2:D1 dans le worksheet S2
    Worksheets("S2").Range("A2:D1").ClearFormats
End Sub
Sub Q16()
    'Supprimer toutes les lignes de la ligne 2 à 11 dans le worksheet S2
    Worksheets("S2").Rows("2:11").Delete
End Sub
Sub Q17()
    'Sélectionner toutes les cellules du worksheet S1 de la cellule A1 à la fin de la ligne (première cellule vide)
    Worksheets("S1").Cells(1, 1).End(xlToRight).Select
End Sub
Sub Q18()
    'Récupérer le nombre de worksheets dans un workbook excel (Affichage du résultat dans un message box)
    Dim nbWorksheets As Integer, msg As String
    nbWorksheets = Worksheets.Count
    msg = "Le nombre de worksheets est " & nbWorksheets
    MsgBox msg
End Sub
Sub Q19()
    'Récupérer le nmobre de ligne dans la sélection
    Dim nbRows As Integer, msg As String
    nbRows = Selection.Rows.Count
    msg = "Le nombre de ligne est " & nbRows
    MsgBox msg
End Sub
Sub Q20()
    'Récupérer le nmobre de colonnes dans la sélection
    Dim nbColumns As Integer, msg As String
    nbColumns = Selection.Columns.Count
    msg = "Le nombre de colonnes est " & nbColumns
    MsgBox msg
End Sub
Sub Q21()
    'Déplacer la sélection à la cellule 5 lignes plus bas et 2 colonne à droite de la cellule B1
    Range("B1").Offset(5, 2).Select
End Sub
Sub Q22()
    'Déplacer la sélection à la cellule 3 lignes plus haut et 2 colonnes à gauche de la cellule F8
    Range("F8").Offset(-3, -2).Select
End Sub
Sub Q23()
    'Doubler la taille de la sélection
    Dim selectionSize As Integer
    selectionSize = Selection.Font.Size
    Selection.Font.Size = selectionSize * 2
End Sub
Sub Q24()
    'Gérer pour sélectionner une plage dont le coin supérieur gauche est B3 avec le nombre de lignes et de colonnes trouvé en A1 et B1
    Range("B3", Cells(3, 2).Offset(Cells(1, 1).Value, Cells(1, 2).Value)).Select
End Sub
Sub Q25()
    'Copie de la cellule B2 du worksheet S2 vers le worksheet S3 sans faire de copier-coller en un seul déclaration
    'Worksheets("S2").Cells(2, 2).Copy Worksheets("S3").Cells(2, 2)
    Worksheets("S3").Cells(2, 2) = Worksheets("S2").Cells(2, 2)
End Sub
Sub Q26()
    'Copie de la plage des cellules A1 à D1 du worksheet S2 au WorkSheet S3 à la même position
    Worksheets("S2").Range("A1:D1").Copy Worksheets("S3").Range("A1:D1")
End Sub
