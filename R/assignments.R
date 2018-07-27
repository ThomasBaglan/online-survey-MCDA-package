#Get the arguments from the PhP script (the 5 chosen criteria and the 25 assignements)
args <- commandArgs(TRUE)

c1<-args[26]
c2<-args[27]
c3<-args[28]
c4<-args[29]
c5<-args[30]
# set up criteria parameters
criteria <- c(c1,c2,c3,c4,c5)
criteriaMinMax <- c("max","max","max","max","max")
names(criteriaMinMax) <- criteria

# set up categories parameters
categories <- c("Good","Neutral","Bad")
categoriesRanks <- c(1,2,3)
names(categoriesRanks) <- categories

# get pT back
setwd("online-survey-MCDA-package/data")
pT<-read.table('online-survey-MCDA-package/data/pT.csv',sep=",",quote="\"",header=T,fill=T)
pT <- data.matrix(pT)
pT<-pT[,-1]
rownames(pT) <- 1:dim(pT)[1]
colnames(pT) <- criteria

# get assignments of first 25 alternatives
assig <-c(args[1], args[2], args[3], args[4], args[5], args[6], args[7], args[8], args[9], args[10], args[11], args[12], args[13], args[14], args[15], args[16], args[17], args[18], args[19], args[20], args[21], args[22], args[23], args[24], args[25])
names(assig) <- 1:25

# generate MR-Sort model
m1 <- MRSortInferenceExact(pT, assig, categoriesRanks, 
                           criteriaMinMax, veto = FALSE,
                           readableWeights = TRUE, 
                           readableProfiles = TRUE,
                           solver = "cplex",
                           alternativesIDs = names(assig))

# check if we found an optimal solution and that the model fits
print(m1)
